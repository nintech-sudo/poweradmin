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

namespace Poweradmin\Application\Presenter;

use Poweradmin\Domain\Error\ErrorMessage;

class ErrorPresenter
{
    public function present(ErrorMessage $error): void
    {
        $msg = $this->sanitizeMessage($error->getMessage());
        $name = $error->getName();

        if ($name !== null) {
            $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        }

        $this->renderError($msg, $name);
    }

    private function sanitizeMessage(string $message): string
    {
        $allowedTags = '<a>';
        return strip_tags($message, $allowedTags);
    }

    private function renderError(string $msg, ?string $name): void
    {
        $safeName = isset($name) ? htmlspecialchars($name, ENT_QUOTES, 'UTF-8') : null;
        $errorContent = ($safeName !== null) ? "$msg (Record: $safeName)" : $msg;

        echo <<<HTML
        <div class="alert alert-danger">
            <strong>Error:</strong> {$errorContent}
        </div>
        HTML;
    }
}
