<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* shop.html.twig */
class __TwigTemplate_6777f33ace6b8aaaaada940b3b18d86408100442a781d8d4fdd1db8cfbe95a45 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "shop.html.twig"));

        $this->parent = $this->loadTemplate("/base.html.twig", "shop.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Blog Index";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<style>
    input{
        display: block;
        margin: 7px;
        width: 120px;
        height: 35px;
        font-size: 15px;
        font-weight: bold;
        background: gray;
        color: white;
        cursor:pointer;
    }
    input:hover{
        background-color: #2f2f2f;
    }
</style>

        <div id=\"paymentButtons\">
            <b>Your shoes are in the bascket. When do you wish to pay?</b>
            ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paymentMethods"]) || array_key_exists("paymentMethods", $context) ? $context["paymentMethods"] : (function () { throw new RuntimeError('Variable "paymentMethods" does not exist.', 25, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["payment"]) {
            // line 26
            echo "                <a href=\"/authorize/";
            echo twig_escape_filter($this->env, $context["payment"], "html", null, true);
            echo "\"><input type=\"button\" value=\"";
            echo twig_escape_filter($this->env, $context["payment"], "html", null, true);
            echo "\" class=\"pay\" /></a>

            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "        </div>
        <div id=\"paymentContent\" style=\"display:none\";>
            <div style=\"width: 500px; margin: auto; padding-top: 150px; padding-bottom: 30px;\">
                <img src=\"https://x.klarnacdn.net/payment-method/assets/badges/generic/klarna.svg\"
                     style=\"width: 500px; margin: auto;\">
            </div>

            <!--Klarna container-->
            <div id=\"klarna_container\" style=\"width: 500px; margin: auto;\"></div>
            <div style=\"width: 500px; margin: auto;\">
                <!--Button to trigger authorize call-->
                <button class=\"authorize\" style=\"width: 500px; height: 50px; margin: auto;\">Your Buy Button</button>
            </div>
        </div>

<script>
    \$(document).ready(function(){

       \$('.pay').click(function(){
           \$(\"paymentContent\").display('block');

       })
    })
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "shop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 29,  98 => 26,  94 => 25,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '/base.html.twig' %}

{% block title %}Blog Index{% endblock %}

{% block body %}
<style>
    input{
        display: block;
        margin: 7px;
        width: 120px;
        height: 35px;
        font-size: 15px;
        font-weight: bold;
        background: gray;
        color: white;
        cursor:pointer;
    }
    input:hover{
        background-color: #2f2f2f;
    }
</style>

        <div id=\"paymentButtons\">
            <b>Your shoes are in the bascket. When do you wish to pay?</b>
            {% for payment in  paymentMethods %}
                <a href=\"/authorize/{{ payment }}\"><input type=\"button\" value=\"{{ payment }}\" class=\"pay\" /></a>

            {% endfor %}
        </div>
        <div id=\"paymentContent\" style=\"display:none\";>
            <div style=\"width: 500px; margin: auto; padding-top: 150px; padding-bottom: 30px;\">
                <img src=\"https://x.klarnacdn.net/payment-method/assets/badges/generic/klarna.svg\"
                     style=\"width: 500px; margin: auto;\">
            </div>

            <!--Klarna container-->
            <div id=\"klarna_container\" style=\"width: 500px; margin: auto;\"></div>
            <div style=\"width: 500px; margin: auto;\">
                <!--Button to trigger authorize call-->
                <button class=\"authorize\" style=\"width: 500px; height: 50px; margin: auto;\">Your Buy Button</button>
            </div>
        </div>

<script>
    \$(document).ready(function(){

       \$('.pay').click(function(){
           \$(\"paymentContent\").display('block');

       })
    })
</script>
{% endblock %}
", "shop.html.twig", "/srv/www/templates/shop.html.twig");
    }
}
