<?php

use yii\db\Migration;

/**
 * Class m171114_160106_add_date_to_comment
 */
class m171114_160106_add_date_to_comment extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('comment', 'date', $this->date());
    }

    public function down()
    {
        $this->dropColumn('comment', 'date');
    }
}
