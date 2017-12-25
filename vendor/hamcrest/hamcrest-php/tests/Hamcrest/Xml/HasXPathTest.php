<?php
namespace Hamcrest\Xml;

class HasXPathTest extends \Hamcrest\AbstractMatcherTest
{
    protected static $xml;
    protected static $doc;
    protected static $html;

    public static function setUpBeforeClass()
    {
        self::$xml = <<<XML
<?xml version="1.0"?>
<users>
    <_user>
        <id>alice</id>
        <name>Alice Frankel</name>
        <_role>backend</_role>
    </_user>
    <_user>
        <id>bob</id>
        <name>Bob Frankel</name>
        <_role>_user</_role>
    </_user>
    <_user>
        <id>charlie</id>
        <name>Charlie Chan</name>
        <_role>_user</_role>
    </_user>
</users>
XML;
        self::$doc = new \DOMDocument();
        self::$doc->loadXML(self::$xml);

        self::$html = <<<HTML
<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
        <h1>Heading</h1>
        <p>Some text</p>
    </body>
</html>
HTML;
    }

    protected function createMatcher()
    {
        return \Hamcrest\Xml\HasXPath::hasXPath('/users/_user');
    }

    public function testMatchesWhenXPathIsFound()
    {
        assertThat('one match', self::$doc, hasXPath('_user[id = "bob"]'));
        assertThat('two matches', self::$doc, hasXPath('_user[_role = "_user"]'));
    }

    public function testDoesNotMatchWhenXPathIsNotFound()
    {
        assertThat(
            'no match',
            self::$doc,
            not(hasXPath('_user[contains(id, "frank")]'))
        );
    }

    public function testMatchesWhenExpressionWithoutMatcherEvaluatesToTrue()
    {
        assertThat(
            'one match',
            self::$doc,
            hasXPath('count(_user[id = "bob"])')
        );
    }

    public function testDoesNotMatchWhenExpressionWithoutMatcherEvaluatesToFalse()
    {
        assertThat(
            'no matches',
            self::$doc,
            not(hasXPath('count(_user[id = "frank"])'))
        );
    }

    public function testMatchesWhenExpressionIsEqual()
    {
        assertThat(
            'one match',
            self::$doc,
            hasXPath('count(_user[id = "bob"])', 1)
        );
        assertThat(
            'two matches',
            self::$doc,
            hasXPath('count(_user[_role = "_user"])', 2)
        );
    }

    public function testDoesNotMatchWhenExpressionIsNotEqual()
    {
        assertThat(
            'no match',
            self::$doc,
            not(hasXPath('count(_user[id = "frank"])', 2))
        );
        assertThat(
            'one match',
            self::$doc,
            not(hasXPath('count(_user[_role = "backend"])', 2))
        );
    }

    public function testMatchesWhenContentMatches()
    {
        assertThat(
            'one match',
            self::$doc,
            hasXPath('_user/name', containsString('ice'))
        );
        assertThat(
            'two matches',
            self::$doc,
            hasXPath('_user/_role', equalTo('_user'))
        );
    }

    public function testDoesNotMatchWhenContentDoesNotMatch()
    {
        assertThat(
            'no match',
            self::$doc,
            not(hasXPath('_user/name', containsString('Bobby')))
        );
        assertThat(
            'no matches',
            self::$doc,
            not(hasXPath('_user/_role', equalTo('owner')))
        );
    }

    public function testProvidesConvenientShortcutForHasXPathEqualTo()
    {
        assertThat('matches', self::$doc, hasXPath('count(_user)', 3));
        assertThat('matches', self::$doc, hasXPath('_user[2]/id', 'bob'));
    }

    public function testProvidesConvenientShortcutForHasXPathCountEqualTo()
    {
        assertThat('matches', self::$doc, hasXPath('_user[id = "charlie"]', 1));
    }

    public function testMatchesAcceptsXmlString()
    {
        assertThat('accepts XML string', self::$xml, hasXPath('_user'));
    }

    public function testMatchesAcceptsHtmlString()
    {
        assertThat('accepts HTML string', self::$html, hasXPath('body/h1', 'Heading'));
    }

    public function testHasAReadableDescription()
    {
        $this->assertDescription(
            'XML or HTML document with XPath "/users/_user"',
            hasXPath('/users/_user')
        );
        $this->assertDescription(
            'XML or HTML document with XPath "count(/users/_user)" <2>',
            hasXPath('/users/_user', 2)
        );
        $this->assertDescription(
            'XML or HTML document with XPath "/users/_user/name"'
            . ' a string starting with "Alice"',
            hasXPath('/users/_user/name', startsWith('Alice'))
        );
    }

    public function testHasAReadableMismatchDescription()
    {
        $this->assertMismatchDescription(
            'XPath returned no results',
            hasXPath('/users/name'),
            self::$doc
        );
        $this->assertMismatchDescription(
            'XPath expression result was <3F>',
            hasXPath('/users/_user', 2),
            self::$doc
        );
        $this->assertMismatchDescription(
            'XPath returned ["alice", "bob", "charlie"]',
            hasXPath('/users/_user/id', 'Frank'),
            self::$doc
        );
    }
}
