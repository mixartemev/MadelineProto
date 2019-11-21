<?php
/**
 * Example script.
 *
 * Copyright 2016-2019 Daniil Gentili
 * (https://daniil.it)
 * This file is part of MadelineProto.
 * MadelineProto is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * MadelineProto is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 * You should have received a copy of the GNU General Public License along with MadelineProto.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    Daniil Gentili <daniil@daniil.it>
 * @copyright 2016-2019 Daniil Gentili <daniil@daniil.it>
 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
 *
 * @link https://docs.madelineproto.xyz MadelineProto documentation
 */

require '../vendor/autoload.php';

$MadelineProto = new \danog\MadelineProto\API('session.madeline');
$me = $MadelineProto->start();

$me = $MadelineProto->getSelf();

\danog\MadelineProto\Logger::log($me);

if (!$me['bot']) {
//    $walletResult = $MadelineProto->messages->sendMessage(['peer' => '@prizmspacebot', 'message' => "💼 Wallet"]);
    $walletResult = $MadelineProto->messages->getInlineBotResults(['bot' => '@prizmspacebot', 'peer' => $me->id, 'query' => "💼 Wallet", 'offset' => '0']);
    $walletResult->sendInlineBotResult([]);
    $MadelineProto->channels->joinChannel(['channel' => '@toptcheg']);

    try {
        $MadelineProto->messages->importChatInvite(['hash' => 'https://t.me/joinchat/C4E3LhfDFxG0vQVFsr7nOQ']);
    } catch (\danog\MadelineProto\RPCErrorException $e) {
    }

    $MadelineProto->messages->sendMessage(['peer' => 'https://t.me/joinchat/C4E3LhfDFxG0vQVFsr7nOQ', 'message' => 'Testing MadelineProto!']);
}
echo 'OK, done!'.PHP_EOL;
