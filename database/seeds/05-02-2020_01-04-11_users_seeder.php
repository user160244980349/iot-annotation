<?php

use Engine\Entity\ServiceBus;

ServiceBus::get('database')->query(
<<<EOQ
INSERT INTO `users` (
    `name`, 
    `password`,
    `email`
) VALUES 
    ('qwe', md5(md5('123')), 'qwe@qwe.qwe'),
    ('asd', md5(md5('123')), 'asd@asd.asd'),
    ('zxc', md5(md5('123')), 'zxc@zxc.zxc');
EOQ
);