<?php

class Chat_model extends CI_Model {
  
  function __construct() 
  {
    /* Call the Model constructor */
    parent::__construct();
  }


  function get_last_item()
  {
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('Chats', 1);
    return $query->result();
  }
  
  
  function insert_message($message,$sender,$receiver)
  {
    $this->message = $message;
    $this->sender = $sender;
    $this->receiver = $receiver;
    $this-> time = time(); 
    if($receiver!='undefined' || $sender!='undefined'){ 
      $this->db->insert('Chats', $this);
    }
  }

  function get_chat_after($time,$sender,$receiver)
  {
    $this->db->where('time >', $time)->where("((sender = '".$sender."' and receiver='".$receiver."' ) or (sender = '".$receiver."' and receiver='".$sender."') )")->order_by('time', 'DESC')->limit(10); 
    $query = $this->db->get('Chats');
    
    $results = array();
    
    foreach ($query->result() as $row)
    {
      $results[] = array($row->sender, $row->message, $row->time);
    }
    
    return array_reverse($results);
  }

  function create_table()
  { 
    /* Load db_forge - used to create databases and tables */
    $this->load->dbforge();
    
    /* Specify the table schema */
    $fields = array(
                    'id' => array(
                                  'type' => 'INT',
                                  'constraint' => 5,
                                  'unsigned' => TRUE,
                                  'auto_increment' => TRUE
                              ),
                    'message' => array(
                                  'type' => 'TEXT'
                              ),
                    'sender' => array(
                                  'type' => 'VARCHAR',
                                  'constraint' => 50
                              ),
                    'receiver' => array(
                                  'type' => 'VARCHAR',
                                  'constraint' => 50
                              ),
                      'time' => array(
                          'type' => 'INT'
                        ),
                    'status' => array(
                        'type' => 'ENUM',
                        'constraint' => array('UNREAD','READ')

                      )
              );
    
    /* Add the field before creating the table */
    $this->dbforge->add_field($fields);
    
    
    /* Specify the primary key to the 'id' field */
    $this->dbforge->add_key('id', TRUE);
    
    
    /* Create the table (if it doesn't already exist) */
    $this->dbforge->create_table('Chats', TRUE);
  }


}