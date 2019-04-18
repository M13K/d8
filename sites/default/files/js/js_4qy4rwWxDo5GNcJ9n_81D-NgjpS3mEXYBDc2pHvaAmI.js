/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, displace) {
  function TableHeader(table) {
    var $table = $(table);

    this.$originalTable = $table;

    this.$originalHeader = $table.children('thead');

    this.$originalHeaderCells = this.$originalHeader.find('> tr > th');

    this.displayWeight = null;
    this.$originalTable.addClass('sticky-table');
    this.tableHeight = $table[0].clientHeight;
    this.tableOffset = this.$originalTable.offset();

    this.$originalTable.on('columnschange', { tableHeader: this }, function (e, display) {
      var tableHeader = e.data.tableHeader;
      if (tableHeader.displayWeight === null || tableHeader.displayWeight !== display) {
        tableHeader.recalculateSticky();
      }
      tableHeader.displayWeight = display;
    });

    this.createSticky();
  }

  function forTables(method, arg) {
    var tables = TableHeader.tables;
    var il = tables.length;
    for (var i = 0; i < il; i++) {
      tables[i][method](arg);
    }
  }

  function tableHeaderInitHandler(e) {
    var $tables = $(e.data.context).find('table.sticky-enabled').once('tableheader');
    var il = $tables.length;
    for (var i = 0; i < il; i++) {
      TableHeader.tables.push(new TableHeader($tables[i]));
    }
    forTables('onScroll');
  }

  Drupal.behaviors.tableHeader = {
    attach: function attach(context) {
      $(window).one('scroll.TableHeaderInit', { context: context }, tableHeaderInitHandler);
    }
  };

  function scrollValue(position) {
    return document.documentElement[position] || document.body[position];
  }

  function tableHeaderResizeHandler(e) {
    forTables('recalculateSticky');
  }

  function tableHeaderOnScrollHandler(e) {
    forTables('onScroll');
  }

  function tableHeaderOffsetChangeHandler(e, offsets) {
    forTables('stickyPosition', offsets.top);
  }

  $(window).on({
    'resize.TableHeader': tableHeaderResizeHandler,

    'scroll.TableHeader': tableHeaderOnScrollHandler
  });

  $(document).on({
    'columnschange.TableHeader': tableHeaderResizeHandler,

    'drupalViewportOffsetChange.TableHeader': tableHeaderOffsetChangeHandler
  });

  $.extend(TableHeader, {
    tables: []
  });

  $.extend(TableHeader.prototype, {
    minHeight: 100,

    tableOffset: null,

    tableHeight: null,

    stickyVisible: false,

    createSticky: function createSticky() {
      var $stickyHeader = this.$originalHeader.clone(true);

      this.$stickyTable = $('<table class="sticky-header"/>').css({
        visibility: 'hidden',
        position: 'fixed',
        top: '0px'
      }).append($stickyHeader).insertBefore(this.$originalTable);

      this.$stickyHeaderCells = $stickyHeader.find('> tr > th');

      this.recalculateSticky();
    },
    stickyPosition: function stickyPosition(offsetTop, offsetLeft) {
      var css = {};
      if (typeof offsetTop === 'number') {
        css.top = offsetTop + 'px';
      }
      if (typeof offsetLeft === 'number') {
        css.left = this.tableOffset.left - offsetLeft + 'px';
      }
      return this.$stickyTable.css(css);
    },
    checkStickyVisible: function checkStickyVisible() {
      var scrollTop = scrollValue('scrollTop');
      var tableTop = this.tableOffset.top - displace.offsets.top;
      var tableBottom = tableTop + this.tableHeight;
      var visible = false;

      if (tableTop < scrollTop && scrollTop < tableBottom - this.minHeight) {
        visible = true;
      }

      this.stickyVisible = visible;
      return visible;
    },
    onScroll: function onScroll(e) {
      this.checkStickyVisible();

      this.stickyPosition(null, scrollValue('scrollLeft'));
      this.$stickyTable.css('visibility', this.stickyVisible ? 'visible' : 'hidden');
    },
    recalculateSticky: function recalculateSticky(event) {
      this.tableHeight = this.$originalTable[0].clientHeight;

      displace.offsets.top = displace.calculateOffset('top');
      this.tableOffset = this.$originalTable.offset();
      this.stickyPosition(displace.offsets.top, scrollValue('scrollLeft'));

      var $that = null;
      var $stickyCell = null;
      var display = null;

      var il = this.$originalHeaderCells.length;
      for (var i = 0; i < il; i++) {
        $that = $(this.$originalHeaderCells[i]);
        $stickyCell = this.$stickyHeaderCells.eq($that.index());
        display = $that.css('display');
        if (display !== 'none') {
          $stickyCell.css({ width: $that.css('width'), display: display });
        } else {
          $stickyCell.css('display', 'none');
        }
      }
      this.$stickyTable.css('width', this.$originalTable.outerWidth());
    }
  });

  Drupal.TableHeader = TableHeader;
})(jQuery, Drupal, window.Drupal.displace);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal, window) {
  function TableResponsive(table) {
    this.table = table;
    this.$table = $(table);
    this.showText = Drupal.t('Show all columns');
    this.hideText = Drupal.t('Hide lower priority columns');

    this.$headers = this.$table.find('th');

    this.$link = $('<button type="button" class="link tableresponsive-toggle"></button>').attr('title', Drupal.t('Show table cells that were hidden to make the table fit within a small screen.')).on('click', $.proxy(this, 'eventhandlerToggleColumns'));

    this.$table.before($('<div class="tableresponsive-toggle-columns"></div>').append(this.$link));

    $(window).on('resize.tableresponsive', $.proxy(this, 'eventhandlerEvaluateColumnVisibility')).trigger('resize.tableresponsive');
  }

  Drupal.behaviors.tableResponsive = {
    attach: function attach(context, settings) {
      var $tables = $(context).find('table.responsive-enabled').once('tableresponsive');
      if ($tables.length) {
        var il = $tables.length;
        for (var i = 0; i < il; i++) {
          TableResponsive.tables.push(new TableResponsive($tables[i]));
        }
      }
    }
  };

  $.extend(TableResponsive, {
    tables: []
  });

  $.extend(TableResponsive.prototype, {
    eventhandlerEvaluateColumnVisibility: function eventhandlerEvaluateColumnVisibility(e) {
      var pegged = parseInt(this.$link.data('pegged'), 10);
      var hiddenLength = this.$headers.filter('.priority-medium:hidden, .priority-low:hidden').length;

      if (hiddenLength > 0) {
        this.$link.show().text(this.showText);
      }

      if (!pegged && hiddenLength === 0) {
        this.$link.hide().text(this.hideText);
      }
    },
    eventhandlerToggleColumns: function eventhandlerToggleColumns(e) {
      e.preventDefault();
      var self = this;
      var $hiddenHeaders = this.$headers.filter('.priority-medium:hidden, .priority-low:hidden');
      this.$revealedCells = this.$revealedCells || $();

      if ($hiddenHeaders.length > 0) {
        $hiddenHeaders.each(function (index, element) {
          var $header = $(this);
          var position = $header.prevAll('th').length;
          self.$table.find('tbody tr').each(function () {
            var $cells = $(this).find('td').eq(position);
            $cells.show();

            self.$revealedCells = $().add(self.$revealedCells).add($cells);
          });
          $header.show();

          self.$revealedCells = $().add(self.$revealedCells).add($header);
        });
        this.$link.text(this.hideText).data('pegged', 1);
      } else {
          this.$revealedCells.hide();

          this.$revealedCells.each(function (index, element) {
            var $cell = $(this);
            var properties = $cell.attr('style').split(';');
            var newProps = [];

            var match = /^display\s*:\s*none$/;
            for (var i = 0; i < properties.length; i++) {
              var prop = properties[i];
              prop.trim();

              var isDisplayNone = match.exec(prop);
              if (isDisplayNone) {
                continue;
              }
              newProps.push(prop);
            }

            $cell.attr('style', newProps.join(';'));
          });
          this.$link.text(this.showText).data('pegged', 0);

          $(window).trigger('resize.tableresponsive');
        }
    }
  });

  Drupal.TableResponsive = TableResponsive;
})(jQuery, Drupal, window);;
/**
* DO NOT EDIT THIS FILE.
* See the following change record for more information,
* https://www.drupal.org/node/2815083
* @preserve
**/

(function ($, Drupal) {
  Drupal.behaviors.tableSelect = {
    attach: function attach(context, settings) {
      $(context).find('th.select-all').closest('table').once('table-select').each(Drupal.tableSelect);
    }
  };

  Drupal.tableSelect = function () {
    if ($(this).find('td input[type="checkbox"]').length === 0) {
      return;
    }

    var table = this;
    var checkboxes = void 0;
    var lastChecked = void 0;
    var $table = $(table);
    var strings = {
      selectAll: Drupal.t('Select all rows in this table'),
      selectNone: Drupal.t('Deselect all rows in this table')
    };
    var updateSelectAll = function updateSelectAll(state) {
      $table.prev('table.sticky-header').addBack().find('th.select-all input[type="checkbox"]').each(function () {
        var $checkbox = $(this);
        var stateChanged = $checkbox.prop('checked') !== state;

        $checkbox.attr('title', state ? strings.selectNone : strings.selectAll);

        if (stateChanged) {
          $checkbox.prop('checked', state).trigger('change');
        }
      });
    };

    $table.find('th.select-all').prepend($('<input type="checkbox" class="form-checkbox" />').attr('title', strings.selectAll)).on('click', function (event) {
      if ($(event.target).is('input[type="checkbox"]')) {
        checkboxes.each(function () {
          var $checkbox = $(this);
          var stateChanged = $checkbox.prop('checked') !== event.target.checked;

          if (stateChanged) {
            $checkbox.prop('checked', event.target.checked).trigger('change');
          }

          $checkbox.closest('tr').toggleClass('selected', this.checked);
        });

        updateSelectAll(event.target.checked);
      }
    });

    checkboxes = $table.find('td input[type="checkbox"]:enabled').on('click', function (e) {
      $(this).closest('tr').toggleClass('selected', this.checked);

      if (e.shiftKey && lastChecked && lastChecked !== e.target) {
        Drupal.tableSelectRange($(e.target).closest('tr')[0], $(lastChecked).closest('tr')[0], e.target.checked);
      }

      updateSelectAll(checkboxes.length === checkboxes.filter(':checked').length);

      lastChecked = e.target;
    });

    updateSelectAll(checkboxes.length === checkboxes.filter(':checked').length);
  };

  Drupal.tableSelectRange = function (from, to, state) {
    var mode = from.rowIndex > to.rowIndex ? 'previousSibling' : 'nextSibling';

    for (var i = from[mode]; i; i = i[mode]) {
      var $i = $(i);

      if (i.nodeType !== 1) {
        continue;
      }

      $i.toggleClass('selected', state);
      $i.find('input[type="checkbox"]').prop('checked', state);

      if (to.nodeType) {
        if (i === to) {
          break;
        }
      } else if ($.filter(to, [i]).r.length) {
          break;
        }
    }
  };
})(jQuery, Drupal);;
/**
 * @file
 * Select-All Button functionality.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.views_bulk_operations = {
    attach: function (context, settings) {
      $('.vbo-view-form').once('vbo-init').each(Drupal.viewsBulkOperationsFrontUi);
    }
  };

  /**
   * Views Bulk Operation selection object.
   */
  Drupal.viewsBulkOperationsSelection = {
    view_id: '',
    display_id: '',
    list: {},
    $placeholder: null,

    /**
     * Bind event handlers to an element.
     *
     * @param {jQuery} element
     */
    bindEventHandlers: function ($element, index) {
      if ($element.length) {
        var selectionObject = this;
        $element.on('keypress', function (event) {
          // Emulate click action for enter key.
          if (event.which === 13) {
            event.preventDefault();
            event.stopPropagation();
            selectionObject.update(this.checked, index, $(this).val());
            $(this).trigger('click');
          }
          if (event.which === 32) {
            selectionObject.update(this.checked, index, $(this).val());
          }
        });
        $element.on('mousedown', function (event) {
          // Act only on left button click.
          if (event.which === 1) {
            selectionObject.update(this.checked, index, $(this).val());
          }
        });
      }
    },

    /**
     * Perform an AJAX request to update selection.
     *
     * @param {bool} state
     * @param {string} value
     */
    update: function (state, index, value) {
      if (value === undefined) {
        value = null;
      }
      if (this.view_id.length && this.display_id.length) {
        var list = {};
        if (value && value != 'on') {
          list[value] = this.list[index][value];
        }
        else {
          list = this.list[index];
        }
        var op = state ? 'remove' : 'add';

        var $placeholder = this.$placeholder;
        var target_uri = '/' + drupalSettings.path.pathPrefix + 'views-bulk-operations/ajax/' + this.view_id + '/' + this.display_id;
        $.ajax(target_uri, {
          method: 'POST',
          data: {
            list: list,
            op: op
          },
          success: function (data) {
            var count = parseInt($placeholder.text());
            count += data.change;
            $placeholder.text(count);
          }
        });
      }
    }
  }

  /**
   * Callback used in {@link Drupal.behaviors.views_bulk_operations}.
   */
  Drupal.viewsBulkOperationsFrontUi = function () {
    var $vboForm = $(this);
    var $viewsTables = $('.vbo-table', $vboForm);
    var $primarySelectAll = $('.vbo-select-all', $vboForm);
    var tableSelectAll = [];

    // When grouping is enabled, there can be multiple tables.
    if ($viewsTables.length) {
      $viewsTables.each(function (index) {
        tableSelectAll[index] = $(this).find('.select-all input').first();
      });
      var $tableSelectAll = $(tableSelectAll);
    }

    // Add AJAX functionality to table checkboxes.
    var $multiSelectElement = $vboForm.find('.vbo-multipage-selector').first();
    if ($multiSelectElement.length) {

      Drupal.viewsBulkOperationsSelection.$placeholder = $multiSelectElement.find('.placeholder').first();
      Drupal.viewsBulkOperationsSelection.view_id = $multiSelectElement.attr('data-view-id');
      Drupal.viewsBulkOperationsSelection.display_id = $multiSelectElement.attr('data-display-id');

      // Get the list of all checkbox values and add AJAX callback.
      Drupal.viewsBulkOperationsSelection.list = [];

      var $contentWrappers;
      if ($viewsTables.length) {
        $contentWrappers = $viewsTables;
      }
      else {
        $contentWrappers = $([$vboForm]);
      }

      $contentWrappers.each(function (index) {
        var $contentWrapper = $(this);
        Drupal.viewsBulkOperationsSelection.list[index] = {};

        $contentWrapper.find('.views-field-views-bulk-operations-bulk-form input[type="checkbox"]').each(function () {
          var value = $(this).val();
          if (value != 'on') {
            Drupal.viewsBulkOperationsSelection.list[index][value] = $(this).parent().find('label').first().text();
            Drupal.viewsBulkOperationsSelection.bindEventHandlers($(this), index);
          }
        });

        // Bind event handlers to select all checkbox.
        if ($viewsTables.length && tableSelectAll.length) {
          Drupal.viewsBulkOperationsSelection.bindEventHandlers(tableSelectAll[index], index);
        }
      });
    }

    // Initialize all selector if the primary select all and
    // view table elements exist.
    if ($primarySelectAll.length && $viewsTables.length) {
      var strings = {
        selectAll: $('label', $primarySelectAll.parent()).html(),
        selectRegular: Drupal.t('Select only items on this page')
      };

      $primarySelectAll.parent().hide();

      if ($viewsTables.length == 1) {
        var colspan = $('thead th', $viewsTables.first()).length;
        var $allSelector = $('<tr class="views-table-row-vbo-select-all even" style="display: none"><td colspan="' + colspan + '"><div><input type="submit" class="form-submit" value="' + strings.selectAll + '"></div></td></tr>');
        $('tbody', $viewsTables.first()).prepend($allSelector);
      }
      else {
        var $allSelector = $('<div class="views-table-row-vbo-select-all" style="display: none"><div><input type="submit" class="form-submit" value="' + strings.selectAll + '"></div></div>');
        $($viewsTables.first()).before($allSelector);
      }

      if ($primarySelectAll.is(':checked')) {
        $('input', $allSelector).val(strings.selectRegular);
        $allSelector.show();
      }
      else {
        var show_all_selector = true;
        $tableSelectAll.each(function () {
          if (!$(this).is(':checked')) {
            show_all_selector = false;
          }
        });
        if (show_all_selector) {
          $allSelector.show();
        }
      }

      $('input', $allSelector).on('click', function (event) {
        event.preventDefault();
        if ($primarySelectAll.is(':checked')) {
          $multiSelectElement.show('fast');
          $primarySelectAll.prop('checked', false);
          $allSelector.removeClass('all-selected');
          $(this).val(strings.selectAll);
        }
        else {
          $multiSelectElement.hide('fast');
          $primarySelectAll.prop('checked', true);
          $allSelector.addClass('all-selected');
          $(this).val(strings.selectRegular);
        }
      });

      $(tableSelectAll).each(function () {
        $(this).on('change', function (event) {
          var show_all_selector = true;
          $tableSelectAll.each(function () {
            if (!$(this).is(':checked')) {
              show_all_selector = false;
            }
          });
          if (show_all_selector) {
            $allSelector.show();
          }
          else {
            $allSelector.hide();
            if ($primarySelectAll.is(':checked')) {
              $('input', $allSelector).trigger('click');
            }
          }
        });
      });
    }
    else {
      $primarySelectAll.first().on('change', function (event) {
        if (this.checked) {
          $multiSelectElement.hide('fast');
        }
        else {
          $multiSelectElement.show('fast');
        }
      });
    }
  };

})(jQuery, Drupal);
;
