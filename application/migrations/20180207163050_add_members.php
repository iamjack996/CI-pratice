<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_members extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'm_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'm_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 60,
                                'null' => FALSE,
                        ),
                        'm_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                                'null' => FALSE,
                                'unique' => TRUE,
                        ),
                        'm_password' => array(
                                'type' => 'TEXT',
                                'null' => FALSE,
                        ),
                        'm_phonenum' => array(
                                'type' => 'INT',
                                'constraint' => 20,
                                'null' => FALSE,
                        ),
                        'm_birth' => array(
                                'type' => 'DATE',
                                'null' => TRUE,
                        ),
                        'm_address' => array(
                                'type' => 'TEXT',
                                'null' => TRUE,
                        ),
                        'm_isAdmin' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 20,
                                'null' => TRUE,
                        ),
                        'm_activated' => array(
                                'type' => 'TINYINT',
                                'default' => 0,
                                'null' => TRUE,
                        ),
                        'm_created_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),
                        'm_updated_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),

                ));
                $this->dbforge->add_key('m_id', TRUE);
                $this->dbforge->create_table('members');
        }

        public function down()
        {
                $this->dbforge->drop_table('members');
        }
}
