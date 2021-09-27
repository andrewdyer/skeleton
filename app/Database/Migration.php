<?php

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Builder;
use Phinx\Migration\AbstractMigration;

abstract class Migration extends AbstractMigration
{
    private $schema;

    public function init(): void
    {
        $this->schema = (new Capsule())->schema();
    }

    protected function getSchema(): Builder
    {
        return $this->schema;
    }
}
