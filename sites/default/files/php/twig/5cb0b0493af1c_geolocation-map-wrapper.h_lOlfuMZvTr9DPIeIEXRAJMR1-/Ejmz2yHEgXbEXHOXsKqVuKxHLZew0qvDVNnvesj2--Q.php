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

/* modules/contrib/geolocation/templates/geolocation-map-wrapper.html.twig */
class __TwigTemplate_ec25a2a3ea41ddea91c696b294dc4de88d799d3dc974b8bf39c79352f3c0e87d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 3, "for" => 4];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                [],
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
        // line 1
        echo "<div ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null)), "html", null, true);
        echo ">
    <div class=\"geolocation-map-controls\">
      ";
        // line 3
        if ( !twig_test_empty(($context["controls"] ?? null))) {
            // line 4
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["controls"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["control"]) {
                // line 5
                echo "          ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["control"]), "html", null, true);
                echo "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['control'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 7
            echo "      ";
        }
        // line 8
        echo "    </div>

    <div class=\"geolocation-map-container js-show\"></div>

    ";
        // line 12
        if ( !twig_test_empty(($context["children"] ?? null))) {
            // line 13
            echo "        ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null)), "html", null, true);
            echo "
    ";
        }
        // line 15
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/geolocation/templates/geolocation-map-wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 15,  88 => 13,  86 => 12,  80 => 8,  77 => 7,  68 => 5,  63 => 4,  61 => 3,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div {{ attributes }}>
    <div class=\"geolocation-map-controls\">
      {% if controls is not empty %}
        {% for control in controls %}
          {{ control }}
        {% endfor %}
      {% endif %}
    </div>

    <div class=\"geolocation-map-container js-show\"></div>

    {% if children is not empty %}
        {{ children }}
    {% endif %}
</div>
", "modules/contrib/geolocation/templates/geolocation-map-wrapper.html.twig", "/var/www/user6.d8.lab/htdocs/d8/modules/contrib/geolocation/templates/geolocation-map-wrapper.html.twig");
    }
}
