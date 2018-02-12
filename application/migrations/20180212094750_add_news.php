<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_news extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'n_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'n_title' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 90,
                                'null' => FALSE,
                        ),
                        'n_slug' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 90,
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                        'n_content' => array(
                                'type' => 'TEXT',
                                'null' => FALSE,
                        ),
                        'n_created_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),
                        'n_updated_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),

                ));
                $this->dbforge->add_key('n_id', TRUE);
                $this->dbforge->create_table('news');
                // $this->dbforge->add_column('members',[
                //     'CONSTRAINT fk_id FOREIGN KEY(b_m_id) REFERENCES members(m_id)',
                // ]);
                // $this->dbforge->add_column('orders',[
                //     'CONSTRAINT fk_id FOREIGN KEY(b_o_random_num) REFERENCES orders(o_random_num)',
                // ]);
        }

        public function down()
        {
                $this->dbforge->drop_table('news');
        }
}
