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

namespace Poweradmin;

class RecordType
{
    // The following is a list of supported record types by PowerDNS
    // https://doc.powerdns.com/authoritative/appendices/types.html

    // Array of possible record types
    private const RECORD_TYPES = array(
        'A',
        'AAAA',
        'CNAME',
        'NS',
        'MX',
        'TXT',
        'PTR',
        'LUA',
        'DDNS',
        'URI',
        'HTTPS',
        'TKEY',
        'TLSA',
        'TSIG',
        'CERT',
        'DNSKEY',
        'DS',
        'NSEC',
        'NSEC3',
        'SIG',
        'SOA',
        'SRV',

        // 'AFSDB',
        // 'A6',
        // 'ALIAS',
        // 'APL',
        // 'CAA',
        // 'CDNSKEY',
        // 'CDS',
        // 'CSYNC',
        // 'DHCID',
        // 'DLV',
        // 'DNAME',
        // 'EUI48',
        // 'EUI64',
        // 'HINFO',
        // 'IPSECKEY',
        // 'KEY',
        // 'KX',
        // 'L32',
        // 'L64',
        // 'LOC',
        // 'LP',
        // 'MAILA',
        // 'MAILB',
        // 'MINFO',
        // 'MR',
        // 'NAPTR',
        // 'NID',
        // 'NSEC3PARAM',
        // 'OPENPGPKEY',
        // 'RKEY',
        // 'RP',
        // 'RRSIG',
        // 'SMIMEA',
        // 'SPF',
        // 'SSHFP',
        // 'SVCB',
        // 'WKS',
        // 'ZONEMD',
    );

    public static function getTypes(): array
    {
        return self::RECORD_TYPES;
    }
}
