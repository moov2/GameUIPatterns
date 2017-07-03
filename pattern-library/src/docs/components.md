## Including a UI Component

To add a new UI component, you will first need to login to the website via the WordPress login form at [/wp-login](/wp-login).

Once logged in, navigate to the "UI Component" menu item on the dashboard and select the child "Add New"

![From within the WordPress dashboard, navigate to UI Component and then the child item Add New.](https://i.imgur.com/t7hBDbH.png)

### Page Fields

#### Title

The title field will be displayed at the top of game pattern pages.

#### Blueprint SVG Code

It is recommended that before pasting your code into the WordPress field that you review any of the CSS in the <span class="text--bold text--red"><style></span> tag. To avoid any conflicts, it is recommended to remove any font-family styles as these will be applied via the external CSS stylesheet. Font weights and colours may still be included.

For optimal performance, it is recommended that the tool [SVGOMG](https://jakearchibald.github.io/svgomg/) is used to minify the output generated for the SVG.

#### Description

The description field will be displayed directly after the title. No classes are <span class="text--bold">required</span>, however if you wish to modify the text you can do so using [text trumps](/components.html#text) found in the pattern library.

#### When To Use

When to use is a section to show the need for the component. What type of games benefit from the component? Which games <span class="text--bold">require</span> the component?

#### Solution

The solution is how the pattern is used. Think about what the component needs to convey, colours often used, icongraphy and labels that are included.

#### Technical Details

This is where any information related to the pattern that hasn't already been listed can be included. If there is a geeky fact you have found out about the pattern, or perhaps heavy documentation that wouldn't be included in the previous fields, this is the section to include it in.

#### Categories

All patterns fit into one of several categories. Select at least one category so that the pattern has helpful breadcrumbs.

#### Featured Image

This image may be used throughout the website to represent the pattern.

The featured image can be the original blueprint or a game example you think represents the pattern well.

### Attatching to existing examples

![The create connections form on the page allows for components and examples to link](http://i.imgur.com/admQ73A.png)

You may sometimes find that you have included pattern examples <span class="text--bold">before</span> you've created the pattern page itself.

This is no problem, within the pattern page editor, you are able to select pattern examples that have been created and link them to the page. These examples will show on the pages front end when published.
