<?php //#1
class test1 {
  static function last_word($sentence) {
    $sentence_array = explode(" ",$sentence);
    return strlen($sentence_array[count($sentence_array) - 1]);
  }

  static function extract_string($str) {
    preg_match_all("/\[[^\]]*\]/", $str, $matches);
    return trim($matches[0][0], '[]');
  }
} ?>

<?php //#2
class test2 {
    static function is_power($number,$base) {
        $n = log($number, $base);
        return (int) $n == $n ? true : false;
    } 

    static function format_number($str) {
        return preg_replace('/[^0-9,.]+/', '', $str);
    }

    static function sum_digits($int) {
        $int_array  = array_map('intval', str_split($int));
        $res = 0;
        for ($i = 0; $i < count($int_array); $i++) {
            $res = $res + (int)$int_array[$i];
        }
        return $res;
    }
} ?>

<div class="">
    <?php echo test1::last_word('Lorem ipsum dolor, sit amet consectetur');?>
</div>

<div class="">
    <?php echo test1::extract_string('adipisicing elit. Earum [couple of words] aut');?>
</div>

<div class="">
    <?php var_dump(test2::is_power(1, 100));?>
</div>

<div class="">
    <?php var_dump(test2::format_number('$4,000.15A'));?>
</div>

<div class="">
    <?php var_dump(test2::sum_digits((-5555))); ?>
</div>

<div class="">
<?php // #3 This is my version of the code
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $ids_list = implode(', ', $ids);

    $result = $connection->query("SELECT x, y FROM values  WHERE id in ($ids_list)");

    if ($result->num_rows > 0) {
        while($row = $result->fetch_row()) {
            $data[] = $row;
        }
    }

    $connection->close();
    
    /*
    Issues
        1. x, y, value and id should be as a variables, instead of strings
        2. Variable $id should be inside SELECT, like this: id=$id
        3. Need to check the connection and close it in the end

    Improvement
        1. Using just one Query with all ID's, instead of send multiple-queries for each ID
        2. Check if it has rows(items with these ID's), then push each $row to the array, if not - nothing to do!

     */
    ?>
</div>

<div class="conn">
  <?php //#4 Answer A: 3 rows, 1 NULL value

  include_once 'config.php';
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //#5i
  $sql = "SELECT customer.Id, customer.Name
    FROM customer
    LEFT JOIN salesman ON customer.Salesman_id = salesman.Id
    WHERE commission BETWEEN 0.12 AND 0.14
  ";

  //#5ii

  $sql = "SELECT salesman.Id, salesman.Name
    FROM salesman
    LEFT JOIN customer ON salesman.Id = customer.Salesman_id
    WHERE customer.Salesman_id IS NULL
    ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
      <div class="">
        <?php echo "id: " . $row["Id"]. " - Name: " . $row["Name"]. "<br>"; ?>
      </div>
    <?php }
  } else {
    echo "0 results";
  }

  $conn->close();
  
//   #6 All of these queries will be successful, but if some fields have empty value and no-default value, then in the table it will be empty as well.
//   If no-ID in the query, it will probably be in the table as 0 every time, just because of int-type.

  ?>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" crossorigin="anonymous"></script>

<script> 
  /*#7 FrontEnd
    To remove duplicate values from an array, we can use the function below. 
    * indexOf-method returns the index of the first element in the array
    The filter-method creates a copy of the array and in this case with following condition:
    If the first index of each element indexOf() is equal to current index, than this element
    appears in the new array, and keep elements with other indexes*/


  document.addEventListener("DOMContentLoaded", function() {
    var arr = [1, 2, 3, 5, 1, 5, 9, 1, 2, 8];

    function unique (arr) {
      let res= arr.filter(function(item, i) {
        return arr.indexOf(item) == i;
      });
      return res;
    }
    // console.log(unique(arr));//[1, 2, 3, 5, 9, 8]

  /*#8 At first we made array with sub-arrays a-times using method fill(),
      and after that method flat() flattes the 2-dimensional array into 1-x*/

    function duplicate(arr, times) {
      return Array(times).fill(arr).flat();
    }

    // console.log(duplicate([1, 2, 3, 4, 5], 3)); //[1, 2, 3, 4, 5, 1, 2, 3, 4, 5, 1, 2, 3, 4, 5]

    /*#9 Yeah sure, it's not working, just because that new buttons (that was added dynamically) don't exist in the DOM
    To fix it, should add on.click Event to the Document with [button selector] instead of directly to the button selector.
    The code below is working, even a button was added later to the page*/


      $(document).on('click', '.clickable', function (e) {
        e.preventDefault();
        console.log('Working!', this);
    });

    /* #10 */
    $( ".btn-primary .badge" ).each(function() {
      $(this).text(Math.floor(Math.random() * 100));
    });

    $(document).on('click', '.btn-primary', function (e) {
        e.preventDefault();

        const qtyBadge = $(this).find('span.badge'),
          qtyBadgeValue = qtyBadge.text(),
          arg = $(this).text().includes('-') ? -1 : 1;

        changedValue = +qtyBadgeValue + arg;

        qtyBadge.text(changedValue);     
    });

  }); 
</script>

<div class="">
  <button class="btn btn-primary js-plus-button">
    +1
    <span class="badge">9</span>
  </button>

  <button class="btn btn-primary js-plus-button">
    +1
    <span class="badge">9</span>
  </button>

  <button class="btn btn-primary js-ninus-button">
    -1
    <span class="badge">9</span>
  </button>
</div>