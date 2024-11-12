CREATE TABLE doctrine_migration_versions
(
    version         varchar(191) NOT NULL,
    executed_at     datetime,
    execution_time  int(11),
    PRIMARY KEY (version)
);