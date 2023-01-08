<?php

class Contakt
{
    static public function createContainer(): string
    {
        return
            '<div class="contactBox">'.
                '<form method="post" class="contactForm">
                    <div class="atlas-group">
                        <label for="email">E-mail:*</label>
                        <input type="email" id="email" name="visitor_email" class="contactInput" placeholder="" required>
                    </div>
                    <div class="atlas-group">
                        <label for="department-selection">Служба:*</label>
                        <select id="department-selection" class="contactSelector" name="concerned_department" required>
                            <option value="">Выбрать службу</option>
                            <option value="billing">Администрация</option>
                            <option value="marketing">Реклама</option>
                            <option value="technical support">Техническая поддержка</option>
                        </select>
                    </div>
                    <div class="atlas-group">
                        <label for="title">Тема сообщения:*</label>
                        <input type="text" id="title" name="email_title" class="contactInput" required placeholder="" pattern=[A-Za-z0-9\s]{8,60}>
                    </div>
                    <div class="atlas-group">
                        <label for="message">Сообщение:*</label>
                        <textarea id="message" name="visitor_message" class="contactText" placeholder="" required></textarea>
                    </div>'.
                    Navi::submitButton().
                '</form>' .
            '</div>';
    }
}