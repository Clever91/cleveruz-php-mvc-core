<?php

namespace cleveruz\phpmvc\interface;

interface IMigration
{
    public function up(): void;
    public function down(): void;
    public function execute(string $sql): void;
}
