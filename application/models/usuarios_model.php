<?php
class usuarios_model extends CI_Model{
    function __construct(){
        $this->load->helper("date");
        $this->load->library('session');
    }
    


    public function loginUserModel() {
		try {			
			$userData =	$this->input->post("user",TRUE);
			$userPassword =	$this->input->post("password",TRUE);//se manda como string
			
			$sql='SELECT * from users where email=?';
			$user=$this->db->query($sql,array($userData));
			
			if($user->num_rows()>0){
				if( (base64_decode($user->row()->password)==$userPassword)) {
					$data= array(
						'id' => $user->row()->id,
						'name_user' => $user->row()->nombre,
						/* 'tipo_usuario' => $user->row()->id_tipoUser */
					);
					$this->session->unset_userdata(Session_Siit);
					$this->session->set_userdata(Session_Siit,$data);

					redirect(base_url()."SiiT");//apunta a la clase del constructor 

				}else{
						//echo "error1"; //error en password 
						redirect('/Login');
					}					
			}else{
				//echo "error2"; //error usuario no existe
				redirect('/Login');
			}
			
		} catch (Exception $e) {
			//echo "error3";
			redirect('/Login');
		}
	}

	public function tics_data($id){
		$query = 'SELECT id_carrera ,num_grupo, id_tutor, num_aprov, num_repro FROM grupos WHERE id_carrera ='.$id;
		$result = $this->db->query($query);

		return $result->result();
	}

	public function get_almns($id_grupo){
		$query = 'SELECT alumnos.id_alumn, alumnos.nombre, alumnos.apellido FROM `alumnos` WHERE alumnos.grupo = "'.$id_grupo.'"';
		$result = $this->db->query($query);
		return $result->result();
	}

	public function count_materias($id_almn){
		$query = 'SELECT COUNT(id_row) AS num_materia FROM `boleta` WHERE id_alumno ='.$id_almn;
		$result = $this->db->query($query);
		return $result->row();
	}

	/* public function get_grupos($id){
		$query = 'SELECT num_grupo, id_tutor, num_aprov, num_repro FROM grupos WHERE id_carrera ='.$id;
		$result = $this->db->query($query);

		return $result->result();
	} */
}
