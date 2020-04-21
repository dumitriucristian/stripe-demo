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

/* authorize.html.twig */
class __TwigTemplate_9c0b278ec24a02c32e5311c6e6318f4d3875eb24ed6780b386bdd7f113505053 extends \Twig\Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "authorize.html.twig"));

        $this->parent = $this->loadTemplate("/base.html.twig", "authorize.html.twig", 1);
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

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        echo "
    <script type=\"text/javascript\">
        //The following method initializes the Klarna Payments JS library
        window.klarnaAsyncCallback = function () {
            Klarna.Payments.init({
                client_token: '";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["paymentToken"]) || array_key_exists("paymentToken", $context) ? $context["paymentToken"] : (function () { throw new RuntimeError('Variable "paymentToken" does not exist.', 10, $this->source); })()), "html", null, true);
        echo "'
            });
            console.log(\"Payments initialized\");
            //The following method loads the payment_method_category in the container with the id of 'klarna_container'
            Klarna.Payments.load({
                container: '#klarna_container',
                payment_method_category: '";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["paymentType"]) || array_key_exists("paymentType", $context) ? $context["paymentType"] : (function () { throw new RuntimeError('Variable "paymentType" does not exist.', 16, $this->source); })()), "html", null, true);
        echo "'

            }, function (res) {
                console.log(\"Load function called\");
                console.log(res);
            });
        };

        /*The following is the authorize function, which triggers Klarna to perform a risk assessment of the purchase
          The successful response of this risk assessment is an authorization token, which in this example is logged in the console
        */
        \$(function(){
            \$(\"button.authorize\").on('click', function(){
                Klarna.Payments.authorize({
                    payment_method_category: '";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["paymentType"]) || array_key_exists("paymentType", $context) ? $context["paymentType"] : (function () { throw new RuntimeError('Variable "paymentType" does not exist.', 30, $this->source); })()), "html", null, true);
        echo "'

                }, function(res) {
                    console.log(\"Response from the authorize call:\");
                    console.log(res);
                })
            })
        })
    </script>


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

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "authorize.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 30,  89 => 16,  80 => 10,  73 => 5,  66 => 4,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '/base.html.twig' %}

{% block title %}Blog Index{% endblock %}
{% block body %}

    <script type=\"text/javascript\">
        //The following method initializes the Klarna Payments JS library
        window.klarnaAsyncCallback = function () {
            Klarna.Payments.init({
                client_token: '{{ paymentToken }}'
            });
            console.log(\"Payments initialized\");
            //The following method loads the payment_method_category in the container with the id of 'klarna_container'
            Klarna.Payments.load({
                container: '#klarna_container',
                payment_method_category: '{{paymentType}}'

            }, function (res) {
                console.log(\"Load function called\");
                console.log(res);
            });
        };

        /*The following is the authorize function, which triggers Klarna to perform a risk assessment of the purchase
          The successful response of this risk assessment is an authorization token, which in this example is logged in the console
        */
        \$(function(){
            \$(\"button.authorize\").on('click', function(){
                Klarna.Payments.authorize({
                    payment_method_category: '{{paymentType}}'

                }, function(res) {
                    console.log(\"Response from the authorize call:\");
                    console.log(res);
                })
            })
        })
    </script>


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

{% endblock %}
", "authorize.html.twig", "/srv/www/templates/authorize.html.twig");
    }
}
