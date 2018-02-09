<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_contacts extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'c_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'c_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 60,
                                'null' => FALSE,
                        ),
                        'c_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                                'null' => FALSE,
                        ),
                        'c_phonenum' => array(
                                'type' => 'INT',
                                'constraint' => 20,
                                'null' => TRUE,
                        ),
                        'c_content' => array(
                                'type' => 'TEXT',
                                'null' => FALSE,
                        ),
                        'c_created_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),
                        'c_updated_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),

                ));
                $this->dbforge->add_key('c_id', TRUE);
                $this->dbforge->create_table('contacts');
        }

        public function down()
        {
                $this->dbforge->drop_table('contacts');
        }
}
