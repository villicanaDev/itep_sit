<?php

/**
 * This class offers some utilities to work with phpdocx objects and documents
 * 
 * @category   Phpdocx
 * @package    utilities
 * @copyright  Copyright (c) Narcea Producciones Multimedia S.L.
 *             (http://www.2mdc.com)
 * @license    phpdocx LICENSE
 * @version    2017.02.20
 * @link       http://www.phpdocx.com
 */
require_once dirname(__FILE__) . '/CreateDocx.inc';

class DOCXPathUtilities
{
    /**
     * Remove the content of a section and the section tag
     *
     * @access public
     * @param string $source Path to the DOCX
     * @param string $target Path to the resulting DOCX (a new file will be created per section)
     * @param int $section Section to be removed: 1, 2...
     * @param array $options
     *        bool 'keepSections' preserve or not the original sections of the splitted document. If false uses the first section for all documents. Default as true
     */
    public function removeSection($source, $target, $section, $options = array())
    {
        if (!file_exists($source)) {
            throw new Exception('File does not exist');
        }

        $targetDocx = new ZipArchive();
        $targetDocx->open($source);

        $domDoc = new DOMDocument('1.0', 'utf-8');
        $domDoc->loadXML($targetDocx->getFromName('word/document.xml'));
        $domXpath = new DOMXPath($domDoc);
        $domXpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');
        $domXpath->registerNamespace('wp', 'http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing');
        $domXpath->registerNamespace('a', 'http://schemas.openxmlformats.org/drawingml/2006/main');
        $domXpath->registerNamespace('c', 'http://schemas.openxmlformats.org/drawingml/2006/chart');
        $domXpath->registerNamespace('pic', 'http://schemas.openxmlformats.org/drawingml/2006/picture');
        $domXpath->registerNamespace('r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');

        // get all elements and iterate them to generate an array with each position to keep section contents
        $query = '//w:body/*';
        $contentNodesDocument = $domXpath->query($query);
        $sectionsContents = array();
        $sectionNumber = 1;
        $firstSectionElement = '';

        // avoid removing a not existing section or DOCX with a single section
        $querySectPr = '//w:body//w:sectPr';
        $contentsSectPr = $domXpath->query($querySectPr);
        $sectionsCount = $contentsSectPr->length;
        if ($sectionsCount <= 1) {
            PhpdocxLogger::logger('There\'s a single section in the DOCX.', 'fatal');
        }
        if ($sectionsCount < $section) {
            PhpdocxLogger::logger('There\'s ' . $sectionsCount . ' sections in the DOCX. Trying to replace the section ' . $section, 'info');
        }

        for ($i = 0; $i < $contentNodesDocument->length; $i++) {
            // get if there's a section tag
            $sectPrLength = $contentNodesDocument->item($i)->getElementsByTagName('sectPr')->length;

            // extract the first section
            if ($sectPrLength > 0 || $contentNodesDocument->item($i)->tagName == 'w:sectPr' && empty($firstSectionElement)) {
                // keep the first section to be used as default section if needed
                if (empty($firstSectionElement)) {
                    $firstSectionElement = $contentNodesDocument->item($i);
                }
            }

            // add the first section if there's a sectPt tag and the keepSections option is false
            if (
                ($sectPrLength > 0 || $contentNodesDocument->item($i)->tagName == 'w:sectPr') &&
                isset($options['keepSections']) && $options['keepSections'] == false && !empty($firstSectionElement)
            ) {
                $firstSectionElementClone = $firstSectionElement->cloneNode(true);

                // check if the current section has content in it and add to the new section if needed
                if ($contentNodesDocument->item($i)->tagName != 'w:sectPr') {
                    if ($contentNodesDocument->item($i)->childNodes->length > 0) {
                        $contentsToBeAddedSectpr = array();
                        foreach ($contentNodesDocument->item($i)->childNodes as $childNode) {
                            // avoid adding sectPr sections
                            if ($childNode->getElementsByTagName('sectPr')->length > 0) {
                                continue;
                            }
                            $contentsToBeAddedSectpr[] = $childNode;
                        }
                        foreach ($contentsToBeAddedSectpr as $contentToBeAddedSectpr) {
                            $firstSectionElementClone->appendChild($contentToBeAddedSectpr);
                        }
                    }
                }

                if ($sectionNumber != $section) {
                    $sectionsContents[] = $firstSectionElementClone;
                }
            } else {
                if ($sectionNumber != $section) {
                    $sectionsContents[] = $contentNodesDocument->item($i);
                }
            }

            // there's a new section
            if ($sectPrLength > 0 || $contentNodesDocument->item($i)->tagName == 'w:sectPr') {
                $sectionNumber++;
            }
        }

        // generate the new DOCX
        $domDocSplit = new DOMDocument('1.0', 'utf-8');
        $domDocSplit->loadXML('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><w:document xmlns:wpc="http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:m="http://schemas.openxmlformats.org/officeDocument/2006/math" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:wp14="http://schemas.microsoft.com/office/word/2010/wordprocessingDrawing" xmlns:wp="http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing" xmlns:w10="urn:schemas-microsoft-com:office:word" xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main" xmlns:w14="http://schemas.microsoft.com/office/word/2010/wordml" xmlns:w15="http://schemas.microsoft.com/office/word/2012/wordml" xmlns:wpg="http://schemas.microsoft.com/office/word/2010/wordprocessingGroup" xmlns:wpi="http://schemas.microsoft.com/office/word/2010/wordprocessingInk" xmlns:wne="http://schemas.microsoft.com/office/word/2006/wordml" xmlns:wps="http://schemas.microsoft.com/office/word/2010/wordprocessingShape" mc:Ignorable="w14 w15 wp14"><w:body></w:body></w:document>');
        $domDocSplitBody = $domDocSplit->getElementsByTagNameNS('http://schemas.openxmlformats.org/wordprocessingml/2006/main', 'body');
        foreach ($sectionsContents as $sectionContent) {
            $importedNode = $domDocSplit->importNode($sectionContent, true);
            $domDocSplitBody->item(0)->appendChild($importedNode);
        }

        // copy the source document to a new target
        copy($source, $target);

        $newDocx = new ZipArchive();
        $newDocx->open($target);
        $newDocx->addFromString('word/document.xml', $domDocSplit->saveXml());
        $newDocx->close();
    }

    /**
     * Splits a DOCX document per section
     * 
     * @access public
     * @param string $source Path to the DOCX
     * @param string $target Path to the resulting DOCX (a new file will be created per section)
     * @param array $options
     *        array 'sections' sections to be splitted, all by default
     *        bool 'keepSections' preserve or not the original sections of the splitted document. If false uses the first section for all documents. Default as true
     * @return void
     */
    public function splitDocx($source, $target, $options = array())
    {
        if (!file_exists($source)) {
            throw new Exception('File does not exist');
        }

        $targetInfo = pathinfo($target);

        $targetDocx = new ZipArchive();
        $targetDocx->open($source);

        $domDoc = new DOMDocument('1.0', 'utf-8');
        $domDoc->loadXML($targetDocx->getFromName('word/document.xml'));
        $domXpath = new DOMXPath($domDoc);
        $domXpath->registerNamespace('w', 'http://schemas.openxmlformats.org/wordprocessingml/2006/main');
        $domXpath->registerNamespace('wp', 'http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing');
        $domXpath->registerNamespace('a', 'http://schemas.openxmlformats.org/drawingml/2006/main');
        $domXpath->registerNamespace('c', 'http://schemas.openxmlformats.org/drawingml/2006/chart');
        $domXpath->registerNamespace('pic', 'http://schemas.openxmlformats.org/drawingml/2006/picture');
        $domXpath->registerNamespace('r', 'http://schemas.openxmlformats.org/officeDocument/2006/relationships');

        // get all elements and iterate them to generate an array with each position to keep section contents
        $query = '//w:body/*';
        $contentNodesDocument = $domXpath->query($query);
        $sectionsContents = array();
        $sectionNumber = 0;
        $firstSectionElement = '';
        for ($i = 0; $i < $contentNodesDocument->length; $i++) {
            // get if there's a section tag
            $sectPrLength = $contentNodesDocument->item($i)->getElementsByTagName('sectPr')->length;

            // extract the first section
            if ($sectPrLength > 0 || $contentNodesDocument->item($i)->tagName == 'w:sectPr' && empty($firstSectionElement)) {
                // keep the first section to be used as default section if needed
                if (empty($firstSectionElement)) {
                    $firstSectionElement = $contentNodesDocument->item($i);
                }
            }

            // add the first section if there's a sectPt tag and the keepSections option is false
            if (
                ($sectPrLength > 0 || $contentNodesDocument->item($i)->tagName == 'w:sectPr') &&
                isset($options['keepSections']) && $options['keepSections'] == false && !empty($firstSectionElement)
            ) {
                $firstSectionElementClone = $firstSectionElement->cloneNode(true);

                // check if the current section has content in it and add to the new section if needed
                if ($contentNodesDocument->item($i)->tagName != 'w:sectPr') {
                    if ($contentNodesDocument->item($i)->childNodes->length > 0) {
                        $contentsToBeAddedSectpr = array();
                        foreach ($contentNodesDocument->item($i)->childNodes as $childNode) {
                            // avoid adding sectPr sections
                            if ($childNode->getElementsByTagName('sectPr')->length > 0) {
                                continue;
                            }
                            $contentsToBeAddedSectpr[] = $childNode;
                        }
                        foreach ($contentsToBeAddedSectpr as $contentToBeAddedSectpr) {
                            $firstSectionElementClone->appendChild($contentToBeAddedSectpr);
                        }
                    }
                }

                // if the sectPr is not the root tag of the section, such as in a w:p,
                // extract it and set as root tag
                if ($firstSectionElementClone->tagName != 'w:sectPr') {
                    $internalSectPrElements = $firstSectionElementClone->getElementsByTagName('sectPr');
                    $internalSectPrElement = $firstSectionElementClone->getElementsByTagName('pPr')->item(0)->removeChild($internalSectPrElements->item(0));
                }
                $sectionsContents[$sectionNumber][] = $firstSectionElementClone;

                // add pending section tag
                if (isset($internalSectPrElement)) {
                    $sectionsContents[$sectionNumber][] = $internalSectPrElement;
                }
            } else {
                $sectionsContents[$sectionNumber][] = $contentNodesDocument->item($i);
            }

            // there's a new section
            if ($sectPrLength > 0 || $contentNodesDocument->item($i)->tagName == 'w:sectPr') {
                $sectionNumber++;
            }
        }

        // counter used for each new file name
        $i = 0;
        // create a new DOCDocument for each new document and generate the new files
        foreach ($sectionsContents as $sectionContents) {
            // increment the file counter
            $i++;

            // avoid sections if requested
            if (isset($options['sections']) && !in_array($i, $options['sections'])) {
                continue;
            }

            // new target for each new file
            $fileDocxPath = $targetInfo['filename'] . $i . '.' . $targetInfo['extension'];

            // copy the source document to a new target
            copy($source, $fileDocxPath);

            $newDocx = new ZipArchive();
            $newDocx->open($fileDocxPath);

            $domDocSplit = new DOMDocument('1.0', 'utf-8');
            $domDocSplit->loadXML('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><w:document xmlns:wpc="http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:m="http://schemas.openxmlformats.org/officeDocument/2006/math" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:wp14="http://schemas.microsoft.com/office/word/2010/wordprocessingDrawing" xmlns:wp="http://schemas.openxmlformats.org/drawingml/2006/wordprocessingDrawing" xmlns:w10="urn:schemas-microsoft-com:office:word" xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main" xmlns:w14="http://schemas.microsoft.com/office/word/2010/wordml" xmlns:w15="http://schemas.microsoft.com/office/word/2012/wordml" xmlns:wpg="http://schemas.microsoft.com/office/word/2010/wordprocessingGroup" xmlns:wpi="http://schemas.microsoft.com/office/word/2010/wordprocessingInk" xmlns:wne="http://schemas.microsoft.com/office/word/2006/wordml" xmlns:wps="http://schemas.microsoft.com/office/word/2010/wordprocessingShape" mc:Ignorable="w14 w15 wp14"><w:body></w:body></w:document>');
            $domDocSplitBody = $domDocSplit->getElementsByTagNameNS('http://schemas.openxmlformats.org/wordprocessingml/2006/main', 'body');
            foreach ($sectionContents as $sectionContent) {
                $importedNode = $domDocSplit->importNode($sectionContent, true);
                $domDocSplitBody->item(0)->appendChild($importedNode);
            }

            // fix pending NS to fix not valid cloning and importing content when working with libxml2
            $headerReferenceTags = $domDocSplit->getElementsByTagNameNS('http://schemas.openxmlformats.org/wordprocessingml/2006/main', 'headerReference');
            if ($headerReferenceTags->length > 0) {
                foreach ($headerReferenceTags as $headerReferenceTag) {
                    if ($headerReferenceTag->hasAttribute('id')) {
                        $headerReferenceTag->setAttribute('r:id', $headerReferenceTag->getAttribute('id'));
                        $headerReferenceTag->removeAttribute('id');
                    }
                }
            }
            $footerReferenceTags = $domDocSplit->getElementsByTagNameNS('http://schemas.openxmlformats.org/wordprocessingml/2006/main', 'footerReference');
            if ($footerReferenceTags->length > 0) {
                foreach ($footerReferenceTags as $footerReferenceTag) {
                    if ($footerReferenceTag->hasAttribute('id')) {
                        $footerReferenceTag->setAttribute('r:id', $footerReferenceTag->getAttribute('id'));
                        $footerReferenceTag->removeAttribute('id');
                    }
                }
            }

            // remove w:p//w:sectPr tags to avoid empty pages at the end of the DOCX
            $domPSectPrTags = $domDocSplit->getElementsByTagNameNS('http://schemas.openxmlformats.org/wordprocessingml/2006/main', 'sectPr');
            foreach($domPSectPrTags as $domPSectPrTag) {
                // if the parent is w:body do nothing
                if ($domPSectPrTag->parentNode->tagName == 'w:body') {
                    continue;
                }

                $internalSectPrElements = $domPSectPrTag->getElementsByTagName('sectPr');
                // keep the parent node before removing it
                $domPSectPrTagParent = $domPSectPrTag->parentNode;
                $internalSectPrElement = $domPSectPrTag->parentNode->parentNode->getElementsByTagName('pPr')->item(0)->removeChild($domPSectPrTag);
                $domPSectPrTagParent->parentNode->parentNode->appendChild($internalSectPrElement);
            }

            $newDocx->addFromString('word/document.xml', $domDocSplit->saveXml());
            $newDocx->close();
        }
    }
}