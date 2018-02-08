<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_orders extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'o_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'o_m_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'null' => FALSE,
                        ),
                        'o_p_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'null' => FALSE,
                        ),
                        'o_status' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 90,
                                'null' => TRUE,
                        ),
                        'o_created_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),
                        'o_updated_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),

                ));
                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (o_m_id) REFERENCES members(m_id)');
                $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (o_p_id) REFERENCES products(p_id)');
                $this->dbforge->add_key('o_id', TRUE);
                $this->dbforge->create_table('orders');
                // $this->dbforge->add_column('members',[
                //     'CONSTRAINT fk_id FOREIGN KEY(o_m_id) REFERENCES members(m_id)',
                // ]);
                // $this->dbforge->add_column('products',[
                //     'CONSTRAINT fk_id FOREIGN KEY(o_p_id) REFERENCES products(p_id)',
                // ]);
        }

        public function down()
        {
                $this->dbforge->drop_table('orders');
        }
}
