<?php

class AdminerLogin50 {
	function loginForm() {
		?>
<script type="text/javascript">

    addEventListener('load', function () {

        // Shorten System menu
        var driver = document.getElementsByName('auth[driver]')[0];
        if (isTag(driver, 'select')) {

            // Remove all drivers
            driver.length = 0;

            // Re-add MySQL
            var option = document.createElement("option");
            option.text = "MySQL";
            option.value = "server";
            driver.add(option);

            // Re-add PostgreSQL
            option = document.createElement("option");
            option.selected = true;
            option.text = "PostgreSQL";
            option.value = "pgsql";
            driver.add(option);

            // Re-add SQLite
            /*
            option = document.createElement("option");
            option.text = "SQLite";
            option.value = "sqlite";
            driver.add(option);
            */
            
            // rename System to Driver
            var th = driver.parentElement.parentElement.getElementsByTagName("th")[0];
            if (th.innerHTML === "System") {
                th.innerHTML = "Driver";
            }
        }

        var server = document.getElementsByName('auth[server]')[0];
        if (isTag(server, 'input')) {

            // Remove localhost placeholder
            server.placeholder = '';

            // rename Server to Host
            th = server.parentElement.parentElement.getElementsByTagName("th")[0];
            if (th.innerHTML === "Server") {
                th.innerHTML = "Host";
            }
        }

        // Prepopulate db, if given in URL as #db=value
        var db = document.getElementsByName('auth[db]')[0];
        if (isTag(server, 'input')) {
            var hash = location.hash.substr(1);
            var value = hash.substr(hash.indexOf('db=')).split('=')[1];
            if (value) {
                db.value = value;
            }
        }

        // Hide checkbox
        var permanent = document.getElementsByName('auth[permanent]')[0];
        if (isTag(permanent, 'input')) {
            permanent.parentElement.style.display = 'none';
        }

        // Change "Submit" to "Go" (for SQLite's sake)
        var inputs = document.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
            if (inputs[i].type == 'submit') {
                inputs[i].value = 'Go';
            }      
        }

    });

</script>
<?php
	}
}
