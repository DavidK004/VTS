<?php 
 interface Select {
    function render():void;
    function setDefaultValue($val):void;
 }

  

 class selectArray implements Select{
    protected string $name;
    protected string $defaultValue = "";
    protected string $id;
    protected string $label;
    protected array $array;
    protected bool $key;

    
     /**
     * selectArray constructor.
     *
     * @param string $name The name attribute of the select element.
     * @param string $id The id attribute of the select element.
     * @param string $label The label text associated with the select element.
     * @param array $array The array used to populate the select options.
     * @param bool $key Whether to use array keys as option values (default: false).
     */
    function __construct(string $name, string $id, string $label, array $array, bool $key = false){
        $this->name=$name;
        $this->id=$id;
        $this->label=$label;
        $this->array=$array;
        $this->key=$key;
    }

  /**
     * Render the select element with its options.
     *
     * @return void
     */
    function render(): void
    {
        ?>
        <label for="<?php echo $this->id;?>">
        <?php echo $this->label;?>
        </label>
        <select name="<?php echo $this->name;?>" id="<?php echo $this->id;?>">
            <option value="">Choose</option>

            <?php 
                foreach($this->array as $k => $v){
                    $optionValue = $v;

                    if($this->key){
                        $optionValue = $k;
                    }
                    $atributes = "";
                    
                    if($optionValue == $this->defaultValue){
                        $atributes .= "selected";
                    }
                    ?>
                        <option <?php echo $atributes?> value="<?php echo $optionValue;?>" ><?php echo htmlspecialchars($v);?></option>
                    <?php
                }
            ?>
        </select>
        <?php
    }
     /**
     * Set the default selected option value.
     *
     * @param mixed $val The value to set as default.
     * @return void
     */
    function setDefaultValue($val): void
    {
        $this->defaultValue = $val;
    }
 }

 class selectNumber extends selectArray{

    protected int $start;
    protected int $end;

    /**
     * selectNumber constructor.
     *
     * @param string $name The name attribute of the select element.
     * @param string $id The id attribute of the select element.
     * @param string $label The label text associated with the select element.
     * @param int $start The starting number in the range.
     * @param int $end The ending number in the range.
     */

    function __construct(string $name, string $id, string $label, int $start, int $end){
        
        if($start > $end){
            [$start,$end] = [$end,$start];
        }

        $this->start=$start;
        $this->end=$end;

        $array = [];
        for($i = $start; $i <= $end; $i++){
            $array[] = $i;
        }

        parent::__construct($name, $id, $label, $array);
    }
 }



   