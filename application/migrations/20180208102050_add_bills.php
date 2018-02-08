<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_bills extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'b_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'b_m_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'null' => FALSE,
                        ),
                        'b_status' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 90,
                                'null' => TRUE,
                        ),
                        'b_created_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),
                        'b_updated_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),

                ));
                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (b_m_id) REFERENCES members(m_id)');
                $this->dbforge->add_key('b_id', TRUE);
                $this->dbforge->create_table('bills');
                // $this->dbforge->add_column('members',[
                //     'CONSTRAINT fk_id FOREIGN KEY(b_m_id) REFERENCES members(m_id)',
                // ]);
                // $this->dbforge->add_column('orders',[
                //     'CONSTRAINT fk_id FOREIGN KEY(b_o_random_num) REFERENCES orders(o_random_num)',
                // ]);
        }

        public function down()
        {
                $this->dbforge->drop_table('bills');
        }
}
