<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_products extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'p_id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'p_title' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 90,
                                'null' => FALSE,
                        ),
                        'p_slug' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 90,
                                'unique' => TRUE,
                                'null' => FALSE,
                        ),
                        'p_description' => array(
                                'type' => 'text',
                                'constraint' => 255,
                                'null' => FALSE,
                        ),
                        'p_image' => array(
                                'type' => 'binary',
                                'null' => TRUE,
                        ),
                        'p_kind' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 60,
                                'null' => TRUE,
                        ),
                        'p_price' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'null' => TRUE,
                        ),
                        'p_created_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),
                        'p_updated_at' => array(
                                'type' => 'timestamp',
                                'null' => TRUE,
                        ),

                ));
                $this->dbforge->add_key('p_id', TRUE);
                $this->dbforge->create_table('products');
        }

        public function down()
        {
                $this->dbforge->drop_table('products');
        }
}
