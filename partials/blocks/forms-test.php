<div <?php td_block_class($block, 'forms-test'); ?>>

    <span class="screen-reader-text"><?php esc_html_e('forms-test', '@textdomain'); ?></span>

    <a href="#after-forms-test" class="screen-reader-text screen-reader-text--display-on-focus screen-reader-text--skiplink"><?php esc_html_e('Skip forms-test', '@textdomain'); ?></a>

    <div class="container">

        <h2>forms-test</h2>

        <form action="">
            <label for="name">Name:</label>
            <input id="name" type="text" name="textfield">

            <label for="address">Enter your address:</label><br>
            <textarea id="address" name="addresstext"></textarea>

            <fieldset>
                <legend>Select your pizza toppings:</legend>
                <input id="ham" type="checkbox" name="toppings" value="ham">
                <label for="ham">Ham</label><br>
                <input id="pepperoni" type="checkbox" name="toppings" value="pepperoni">
                <label for="pepperoni">Pepperoni</label><br>
                <input id="mushrooms" type="checkbox" name="toppings" value="mushrooms">
                <label for="mushrooms">Mushrooms</label><br>
                <input id="olives" type="checkbox" name="toppings" value="olives">
                <label for="olives">Olives</label>
            </fieldset>

            <fieldset>
                <legend>Choose a shipping method:</legend>
                <input id="overnight" type="radio" name="shipping" value="overnight">
                <label for="overnight">Overnight</label><br>
                <input id="twoday" type="radio" name="shipping" value="twoday">
                <label for="twoday">Two day</label><br>
                <input id="ground" type="radio" name="shipping" value="ground">
                <label for="ground">Ground</label>
            </fieldset>

            <label for="favcity">Choose your favorite city?</label>
            <select id="favcity" name="select">
                <option value="1">Amsterdam</option>
                <option value="2">Buenos Aires</option>
                <option value="3">Delhi</option>
                <option value="4">Hong Kong</option>
                <option value="5">London</option>
                <option value="6">Los Angeles</option>
                <option value="7">Moscow</option>
                <option value="8">Mumbai</option>
                <option value="9">New York</option>
                <option value="10">Sao Paulo</option>
                <option value="11">Tokyo</option>
            </select>

            <label for="favcity2">Choose your favorite city?</label>
            <select id="favcity2" name="favcity2">
                <optgroup label="Asia">
                    <option value="3">Delhi</option>
                    <option value="4">Hong Kong</option>
                    <option value="8">Mumbai</option>
                    <option value="11">Tokyo</option>
                </optgroup>
                <optgroup label="Europe">
                    <option value="1">Amsterdam</option>
                    <option value="5">London</option>
                    <option value="7">Moscow</option>
                </optgroup>
                <optgroup label="North America">
                    <option value="6">Los Angeles</option>
                    <option value="9">New York</option>
                </optgroup>
                <optgroup label="South America">
                    <option value="2">Buenos Aires</option>
                    <option value="10">Sao Paulo</option>
                </optgroup>
            </select>



        </form>

    </div>

    <div id="after-forms-test"></div>

</div>
