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

/* modules/contrib/addtoany/templates/addtoany-standard.html.twig */
class __TwigTemplate_10e26dc0bb4b3e81f4bb915c4051627a84d18ebe037aafa5672c908549e7c852 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["spaceless" => 19, "if" => 21, "set" => 22];
        $filters = ["url_encode" => 23, "raw" => 37];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['spaceless', 'if', 'set'],
                ['url_encode', 'raw'],
                []
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
        // line 19
        ob_start();
        // line 20
        echo "
  ";
        // line 21
        if ((($context["button_setting"] ?? null) != "none")) {
            // line 22
            echo "    ";
            ob_start();
            // line 23
            echo "      <a class=\"a2a_dd addtoany_share\" href=\"https://www.addtoany.com/share#url=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_urlencode_filter($this->sandbox->ensureToStringAllowed(($context["link_url"] ?? null))), "html", null, true);
            echo "&amp;title=";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_urlencode_filter($this->sandbox->ensureToStringAllowed(($context["link_title"] ?? null))), "html", null, true);
            echo "\">
        ";
            // line 24
            if (($context["button_image"] ?? null)) {
                // line 25
                echo "          <img src=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["button_image"] ?? null)), "html", null, true);
                echo "\">
        ";
            }
            // line 27
            echo "      </a>
    ";
            $context["universal_button"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 29
            echo "  ";
        }
        // line 30
        echo "
  <span class=\"a2a_kit a2a_kit_size_";
        // line 31
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["buttons_size"] ?? null)), "html", null, true);
        echo " addtoany_list\" data-a2a-url=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link_url"] ?? null)), "html", null, true);
        echo "\" data-a2a-title=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["link_title"] ?? null)), "html", null, true);
        echo "\">
    ";
        // line 32
        if ((($context["universal_button_placement"] ?? null) == "before")) {
            // line 33
            echo "      ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["universal_button"] ?? null)), "html", null, true);
            echo "
    ";
        }
        // line 35
        echo "
    ";
        // line 36
        if (($context["addtoany_html"] ?? null)) {
            // line 37
            echo "      ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["addtoany_html"] ?? null)));
            echo "
    ";
        }
        // line 39
        echo "
    ";
        // line 40
        if ((($context["universal_button_placement"] ?? null) == "after")) {
            // line 41
            echo "      ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["universal_button"] ?? null)), "html", null, true);
            echo "
    ";
        }
        // line 43
        echo "  </span>

";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "modules/contrib/addtoany/templates/addtoany-standard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 43,  122 => 41,  120 => 40,  117 => 39,  111 => 37,  109 => 36,  106 => 35,  100 => 33,  98 => 32,  90 => 31,  87 => 30,  84 => 29,  80 => 27,  74 => 25,  72 => 24,  65 => 23,  62 => 22,  60 => 21,  57 => 20,  55 => 19,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Default theme implementation to standard AddToAny buttons.
 *
 * Available variables:
 * - addtoany_html: HTML for AddToAny buttons.
 * - button_image: URL for universal button.
 * - button_setting: Setting of button.
 * - button_size: Size of buttons.
 * - universal_button_placement: Value of 'before' or 'after' to place button.
 * - link_url: Value of URL to share.
 * - link_title: Value of page title to share.
 *
 * @ingroup themeable
 */
#}
{# Remove whitespace between tags for even spacing between buttons. #}
{% spaceless %}

  {% if button_setting != 'none' %}
    {% set universal_button %}
      <a class=\"a2a_dd addtoany_share\" href=\"https://www.addtoany.com/share#url={{ link_url|url_encode }}&amp;title={{ link_title|url_encode }}\">
        {% if button_image %}
          <img src=\"{{ button_image }}\">
        {% endif %}
      </a>
    {% endset  %}
  {% endif %}

  <span class=\"a2a_kit a2a_kit_size_{{ buttons_size }} addtoany_list\" data-a2a-url=\"{{ link_url }}\" data-a2a-title=\"{{ link_title }}\">
    {% if universal_button_placement == 'before' %}
      {{ universal_button }}
    {% endif %}

    {% if addtoany_html %}
      {{ addtoany_html|raw }}
    {% endif %}

    {% if universal_button_placement == 'after' %}
      {{ universal_button }}
    {% endif %}
  </span>

{% endspaceless %}
", "modules/contrib/addtoany/templates/addtoany-standard.html.twig", "/var/www/user6.d8.lab/htdocs/d8/modules/contrib/addtoany/templates/addtoany-standard.html.twig");
    }
}
