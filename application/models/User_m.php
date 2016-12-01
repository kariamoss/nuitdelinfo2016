<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function verif_connexion($donnees)
    {
        $sql = "SELECT * from user WHERE email=\"".$donnees['mail']."\"
        and password=\"".$donnees['password']."\" and confirmation=\"".'0'."\";";
        $query=$this->db->query($sql);
        if($query->num_rows()==1)
        {
            $row=$query->result_array();
            $donnees_resultat=$row[0];
            return $donnees_resultat;
        }
        else
            return false;
    }

    public function add_interpret($data)
    {
        //Insert new user
        $user = array(
            'id_right' => $data['id_right'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'confirmation' => $data['confirmation']
        );
        $this->db->insert('user', $user);

        //Get new user id
        $id_user = $this -> db
            -> select('id_user')
            -> where('email', $data['email'])
            -> limit(1)
            -> get('user')
            -> result_array()[0]['id_user'];

        //Insert new interpret
        $interpret = array(
            'id_user' => $id_user,
            'gender' => $data['gender'],
            'origin' => $data['origin'],
            'age' => $data['age'],
            'qualification' => $data['qualification'],
            'adress' => $data['adress'],
            'postal_code' => $data['postal_code'],
            'town' => $data['town'],
            'private_phone' => $data['private_phone'],
            'professional_phone' => $data['professional_phone'],
            'portable' => $data['portable'],
        );
        $this->db->insert('interpret', $interpret);
        $id_interpret = $this->db->insert_id();

        //Insert and bind new languages
        $x = 1;
        foreach ($data["language"] as $language):
            $languages = array(
                'name_language' => $language,
                'id_lang_certificate' => $data['id_lang_certificate'][$x],
                'id_lang_type' => $data['id_lang_type'][$x]
            );
            $this->db->insert('language',$languages);
            $id_language = $this->db->insert_id();

            $speak = array(
                'id_interpret' => $id_interpret,
                'id_language' => $id_language
            );
            $this->db->insert('speak',$speak);

            $x = $x +1;
        endforeach;




        #$sql = "INSERT user (login,email,password,droit,valide) VALUES (\"".$donnees['login']."\",\"".$donnees['email']."\",
        #\"".$donnees['pass']."\",1,1) ;";
        #$this->db->query($sql);


        #$sql = "SELECT * from user WHERE mail=\"".$data['mail']."\"
        #and password=\"".$data['password']."\";";
        #$query=$this->db->query($sql);
        #if($query->num_rows()==1)
        #{
        #    $row=$query->result_array();
        #    $donnees_resultat=$row[0];
        #    return $donnees_resultat;
        #}
        #else
        #    return false;
    }

}