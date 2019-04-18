<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/ive/templates/node--article--full.html.twig */
class __TwigTemplate_ea92ad12957b2ca8c09be280badbae149afe6a881eaa938882b9fa0ef179c1d8 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 2, "if" => 17, "trans" => 27];
        $filters = ["clean_class" => 4];
        $functions = ["attach_library" => 12];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'trans'],
                ['clean_class'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $context["classes"] = [0 => "node", 1 => ("node--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($this->getAttribute(        // line 4
($context["node"] ?? null), "bundle", [])))), 2 => (($this->getAttribute(        // line 5
($context["node"] ?? null), "isPromoted", [], "method")) ? ("node--promoted") : ("")), 3 => (($this->getAttribute(        // line 6
($context["node"] ?? null), "isSticky", [], "method")) ? ("node--sticky") : ("")), 4 => (( !$this->getAttribute(        // line 7
($context["node"] ?? null), "isPublished", [], "method")) ? ("node--unpublished") : ("")), 5 => ((        // line 8
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null))))) : ("")), 6 => "clearfix"];
        // line 12
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("classy/node"), "html", null, true);
        echo "
";
        // line 13
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("classy/node"), "html", null, true);
        echo "
<article";
        // line 14
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
        echo ">
    <header>
        ";
        // line 16
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null)), "html", null, true);
        echo "
        ";
        // line 17
        if ( !($context["page"] ?? null)) {
            // line 18
            echo "            <h2";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["title_attributes"] ?? null), "addClass", [0 => "node__title"], "method")), "html", null, true);
            echo ">
                <a href=\"";
            // line 19
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null)), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null)), "html", null, true);
            echo "</a>
            </h2>
        ";
        }
        // line 22
        echo "        ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null)), "html", null, true);
        echo "
        ";
        // line 23
        if (($context["display_submitted"] ?? null)) {
            // line 24
            echo "            <div class=\"node__meta\">
                ";
            // line 26
            echo "                <span";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_attributes"] ?? null)), "html", null, true);
            echo ">
          ";
            // line 27
            echo t("Submitted by @author_name on @date", array("@author_name" => ($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ));
            // line 28
            echo "        </span>
                ";
            // line 29
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null)), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 32
        echo "    </header>
    ";
        // line 33
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("ive/tabs"), "html", null, true);
        echo "
    <div";
        // line 34
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content_attributes"] ?? null), "addClass", [0 => "node__content", 1 => "clearfix"], "method")), "html", null, true);
        echo ">
        <div id=\"tabs\">
            <ul>
                <li><a href=\"#tabs-1\">";
        // line 37
        echo t("Details", array());
        echo "</a></li>
                <li><a href=\"#tabs-2\">";
        // line 38
        echo t("Image", array());
        echo "</a></li>
                <li><a href=\"#tabs-3\">";
        // line 39
        echo t("Comment", array());
        echo "</a></li>
            </ul>
            <div id=\"tabs-1\">
                ";
        // line 42
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "field_tags", [])), "html", null, true);
        echo "
                ";
        // line 43
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "body", [])), "html", null, true);
        echo "
            </div>
            <div id=\"tabs-2\">
                ";
        // line 46
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_image", []), 0, [])), "html", null, true);
        echo "
            </div>
            <div id=\"tabs-3\">
                ";
        // line 49
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "comment", [])), "html", null, true);
        echo "
            </div>
        </div>
    </div>
</article>";
    }

    public function getTemplateName()
    {
        return "themes/custom/ive/templates/node--article--full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 49,  157 => 46,  151 => 43,  147 => 42,  141 => 39,  137 => 38,  133 => 37,  127 => 34,  123 => 33,  120 => 32,  114 => 29,  111 => 28,  109 => 27,  104 => 26,  101 => 24,  99 => 23,  94 => 22,  86 => 19,  81 => 18,  79 => 17,  75 => 16,  70 => 14,  66 => 13,  62 => 12,  60 => 8,  59 => 7,  58 => 6,  57 => 5,  56 => 4,  55 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{%
    set classes = [
    'node',
    'node--type-' ~ node.bundle|clean_class,
    node.isPromoted() ? 'node--promoted',
    node.isSticky() ? 'node--sticky',
    not node.isPublished() ? 'node--unpublished',
    view_mode ? 'node--view-mode-' ~ view_mode|clean_class,
    'clearfix',
]
%}
{{ attach_library('classy/node') }}
{{ attach_library('classy/node') }}
<article{{ attributes.addClass(classes) }}>
    <header>
        {{ title_prefix }}
        {% if not page %}
            <h2{{ title_attributes.addClass('node__title') }}>
                <a href=\"{{ url }}\" rel=\"bookmark\">{{ label }}</a>
            </h2>
        {% endif %}
        {{ title_suffix }}
        {% if display_submitted %}
            <div class=\"node__meta\">
                {#       {{ author_picture }} #}
                <span{{ author_attributes }}>
          {% trans %}Submitted by {{ author_name }} on {{ date }}{% endtrans %}
        </span>
                {{ metadata }}
            </div>
        {% endif %}
    </header>
    {{ attach_library('ive/tabs') }}
    <div{{ content_attributes.addClass('node__content', 'clearfix') }}>
        <div id=\"tabs\">
            <ul>
                <li><a href=\"#tabs-1\">{% trans %}Details{% endtrans %}</a></li>
                <li><a href=\"#tabs-2\">{% trans %}Image{% endtrans %}</a></li>
                <li><a href=\"#tabs-3\">{% trans %}Comment{% endtrans %}</a></li>
            </ul>
            <div id=\"tabs-1\">
                {{ content.field_tags }}
                {{ content.body }}
            </div>
            <div id=\"tabs-2\">
                {{ content.field_image.0 }}
            </div>
            <div id=\"tabs-3\">
                {{ content.comment }}
            </div>
        </div>
    </div>
</article>", "themes/custom/ive/templates/node--article--full.html.twig", "/var/www/user6.d8.lab/htdocs/d8/themes/custom/ive/templates/node--article--full.html.twig");
    }
}
