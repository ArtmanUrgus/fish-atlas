<?php

class SearchField
{
    private $m_searchWord;
    private $m_id;

    function __construct() {
        $this->m_id = 'searchField';
        $this->m_searchWord = 'Search';
    }

    public function createSearchField(): string
    {
        //<input type="text" id="" class="textInput" autocomplete="off" value="Search" keydown="searchContent(this)" />
        //<span id="g-search-button"></span>

        return '&lt;input type=&quot;text&quot; id=&quot;'.$this->m_id.'&quot; class=&quot;textInput&quot;'.
            ' autocomplete=&quot;off&quot; value=&quot;'.$this->m_searchWord.'&quot;'.
            'keydown=&quot;searchContent(this);&quot; /&gt;'.
            '&lt;div class=&quot;main-menu-tab box&quot;&gt;'.
            '&lt;/div&gt;'.
            '&lt;/label&gt;';
    }
}

class SearchButton
{
    private $m_id;

    function __construct() {
        $this->m_id = 'searchButton';
    }

    public function createSearchButton(): string
    {
        //<input type="text" id="" class="textInput" autocomplete="off" value="Search" keydown="searchContent(this)" />
        //<span id="g-search-button"></span>

        return '&lt;input type=&quot;text&quot; id=&quot;'.$this->m_id.'&quot; class=&quot;textInput&quot;'.
            ' autocomplete=&quot;off&quot; value=&quot;&quot;'.
            'keydown=&quot;searchContent(this);&quot; /&gt;'.
            '&lt;div class=&quot;main-menu-tab box&quot;&gt;'.
            '&lt;/div&gt;'.
            '&lt;/label&gt;';
    }
}

class SearchBox
{
    private $m_searchField;
    private $m_searchButton;

    function __construct() {
        $this->m_searchField = new SearchField();
        $this->m_searchButton = new SearchButton();
    }

    public function createSearchBox(): string
    {
        return $this->m_searchField->createSearchField() . $this->m_searchButton->createSearchButton();
    }
}