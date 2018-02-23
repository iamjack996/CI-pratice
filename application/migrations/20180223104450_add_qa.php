<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_qa extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                          'q_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                          'q_keyword' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 100,
                                'null' => FALSE,
                        ),
                          'q_answer' => array(
                                'type' => 'TEXT',
                                'null' => FALSE,
                        ),
                          'q_created_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),
                          'q_updated_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),

                ));
                $this->dbforge->add_key('q_id', TRUE);
                $this->dbforge->create_table('qa');
        }

        public function down()
        {
                $this->dbforge->drop_table('qa');
        }
}
