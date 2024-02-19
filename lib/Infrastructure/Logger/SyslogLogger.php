<?php

/*  Poweradmin, a friendly web-based admin tool for PowerDNS.
 *  See <https://www.poweradmin.org> for more details.
 *
 *  Copyright 2007-2010 Rejo Zenger <rejo@zenger.nl>
 *  Copyright 2010-2023 Poweradmin Development Team
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace Poweradmin\Infrastructure\Logger;

class SyslogLogger implements LoggerInterface
{
    private string $ident;
    private int $facility;

    public function __construct(string $ident = 'poweradmin', int $facility = LOG_USER)
    {
        $this->ident = $ident;
        $this->facility = $facility;

        openlog($this->ident, LOG_PERROR, $this->facility);
    }

    public function info(string $message): void
    {
        syslog(LOG_INFO, $message);
    }

    public function warn(string $message): void
    {
        syslog(LOG_WARNING, $message);
    }

    public function error(string $message): void
    {
        syslog(LOG_ERR, $message);
    }

    public function notice(string $message): void
    {
        syslog(LOG_NOTICE, $message);
    }

    public function __destruct()
    {
        closelog();
    }
}
