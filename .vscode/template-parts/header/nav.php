<?php
/**
 * Navigation 
 * 
 * @package Atsuya
 */

$menu_class = \ATSUYA_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('atsuya_header_menu');

$header_menus = wp_get_nav_menu_items($header_menu_id);
?>

<div class="navbar">
  <div class="custom-logo">
    <?php
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
    ?>
  </div>

  <?php if (!empty($header_menus) && is_array($header_menus)) : ?>
      <ul class="nav-items">
          <?php foreach ($header_menus as $menu_item) :
              if (!$menu_item->menu_item_parent) : // Check if the menu item is a parent
                  $child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
                  $has_children = !empty($child_menu_items) && is_array($child_menu_items);
                  ?>
                  <li class="<?php echo $has_children ? 'nav-item-dropdown' : 'nav-item'; ?>">
                      <a href="<?php echo esc_url($menu_item->url); ?>" class="<?php echo $has_children ? 'dropdown-toggle' : ''; ?>">
                          <?php echo esc_html($menu_item->title); ?>
                      </a>

                      <?php if ($has_children) : ?>
                          <div class="dropdown-content">
                              <ul class="dropdown-list">
                                  <?php foreach ($child_menu_items as $child_menu_item) : ?>
                                      <li>
                                          <a href="<?php echo esc_url($child_menu_item->url); ?>">
                                              <?php echo esc_html($child_menu_item->title); ?>
                                          </a>
                                      </li>
                                  <?php endforeach; ?>
                              </ul>
                          </div>
                      <?php endif; ?>
                  </li>
              <?php endif; ?>
          <?php endforeach; ?>
      </ul>
  <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default link behavior

            var dropdownContent = toggle.nextElementSibling;

            // Close all other dropdowns
            document.querySelectorAll('.dropdown-content').forEach(function(content) {
                if (content !== dropdownContent) {
                    content.style.display = 'none';
                }
            });

            // Toggle the clicked dropdown
            dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
        });
    });

    // Hide dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.matches('.dropdown-toggle')) {
            document.querySelectorAll('.dropdown-content').forEach(function(content) {
                content.style.display = 'none';
            });
        }
    });
})
</script>
