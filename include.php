<?
class SLChangeAnonymous
{
    public static function Handler(&$content)
    {
        if (!defined('ADMIN_SECTION') || ADMIN_SECTION !== true) {
            $content = preg_replace_callback('#<a([^>]+?)href\s*=\s*(["\']*)\s*(http|https)://([^"\'\s>]+)\s*\\2([^>]*?)>(.*?)</a>#is', 'self::changeLink', $content);
        }
    }

    private function changeLink($matches)
    {
        if (strpos($matches[0], "katvin.com") === false) {
            return "<a$matches[1]href=$matches[2]http://katvin.com/?$matches[3]://$matches[4]$matches[2]$matches[5]>$matches[6]</a>";
        } else {
            return $matches[0];
        }
    }
}
?>