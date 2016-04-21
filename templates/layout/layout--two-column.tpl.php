<?php
/**
 * @file
 * Template for a 2 column layout.
 *
 * This template provides a two column layout with the sidebar on the right and
 * a roughly 60/40 split.
 *
 * Variables:
 * - $title: The page title, for use in the actual HTML content.
 * - $messages: Status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links: Array of actions local to the page, such as 'Add menu' on
 *   the menu administration interface.
 * - $classes: Array of CSS classes to be added to the layout wrapper.
 * - $attributes: Array of additional HTML attributes to be added to the layout
 *     wrapper. Flatten using backdrop_attributes().
 * - $content: An array of content, each item in the array is keyed to one
 *   region of the layout. This layout supports the following sections:
 *   - $content['header']
 *   - $content['top']
 *   - $content['content']
 *   - $content['sidebar']
 *   - $content['footer']
 */
?>
<div class="layout--two-column <?php print implode(' ', $classes); ?>"<?php print backdrop_attributes($attributes); ?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>

  <?php if ($content['header']): ?>
    <header class="l-header" role="banner" aria-label="<?php print t('Site header'); ?>">
      <div class="l-header-inner-wrapper l-site-width-wrapper l-row">
        <div class="l-header-innermost-wrapper l-col-xs-12">
          <?php print $content['header']; ?>
        </div>
      </div>
    </header>
  <?php endif; ?>

  <?php if ($messages): ?>
    <div class="l-messages">
      <div class="l-messages-inner-wrapper l-site-width-wrapper l-row">
        <div class="l-messages-innermost-wrapper l-site-width-wrapper l-col-xs-12">
          <?php print $messages; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['top']): ?>
    <div class="l-top">
      <div class="l-top-inner-wrapper l-site-width-wrapper l-row">
        <div class="l-top-innermost-wrapper l-col-xs-12">
          <?php print $content['top']; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="l-container">
    <div class="l-container-inner-wrapper l-site-width-wrapper l-row">
      <main class="l-content l-col-xs-12 l-col-lg-9" role="main">
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
          <h1 class="page-title">
            <?php print $title; ?>
          </h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <?php if ($tabs): ?>
          <div class="tabs">
            <?php print $tabs; ?>
          </div>
        <?php endif; ?>

        <?php print $action_links; ?>
        <?php print $content['content']; ?>
      </main>

      <?php if ($content['sidebar']): ?>
        <div class="l-sidebar l-col-xs-12 l-col-lg-3">
          <?php print $content['sidebar']; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <?php if ($content['footer']): ?>
    <footer class="l-footer">
        <div class="l-footer-bottom">
          <div class="l-site-width-wrapper l-footer-bottom-inner-wrapper">
            <?php print $content['footer']; ?>
          </div>
        </div>
    </footer>
  <?php endif; ?>
</div>
