<?php
namespace App;
class View
{
    public $layout = 'default';
    public $vars = [];
    /**
     * display errors in view
     * @return string
     */
    public function flash()
    {
        if (isset($_SESSION['flash'])) {
            ?>
            <div class="alert alert-<?= $_SESSION['flash']['type']; ?>">
                <?= $_SESSION['flash']['message']; ?>
            </div>
            <?php
        }
        unset($_SESSION['flash']);
    }


    /**
     * render view
     * @param null $folder
     * @param null $view
     */
    public function render($folder, $view,$key, $value=null)
    {
        if (is_array($key)) {
            $this->vars += $key;
        } else {
            $this->vars[$key] = $value;
        }
        //extract variables for views
        extract($this->vars);
        //define views.php
        $view = ROOT . DS . 'views' . DS . $folder . DS . $view . '.php';
        //start require views.php
        ob_start();
        //require views.php
        require($view);
        //play views.php
        $content = ob_get_contents();
        ob_end_clean();
        //require layouts
        require ROOT . DS . 'views' . DS . 'layouts' . DS . $this->layout . '.php';
    }
    /**
     * redirect view
     * @param $url
     * @param null $code
     */
    public static function redirect($url, $code = null)
    {
        if ($code == 301) {
            header("HTTP/1.1 301 Moved Permanently");
        }
        header("Location: " . $url);
    }
}
