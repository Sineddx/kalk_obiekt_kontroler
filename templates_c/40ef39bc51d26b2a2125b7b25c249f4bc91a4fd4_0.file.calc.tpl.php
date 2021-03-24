<?php
/* Smarty version 3.1.39, created on 2021-03-24 11:04:20
  from 'F:\xampp\htdocs\kalk_obiekt\app\calc\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605b0ea4128662_44477680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40ef39bc51d26b2a2125b7b25c249f4bc91a4fd4' => 
    array (
      0 => 'F:\\xampp\\htdocs\\kalk_obiekt\\app\\calc\\calc.tpl',
      1 => 1616580258,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_605b0ea4128662_44477680 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_118683076605b0ea4117986_48224936', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../../templates/main.tpl");
}
/* {block 'content'} */
class Block_118683076605b0ea4117986_48224936 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_118683076605b0ea4117986_48224936',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <!-- <h3 class="section-sub-title">Get</h3> -->
                <h2 class="section-title mb-3">Kalkulator</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mb-5">



                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
CalcCompute" method="get" class="p-5 bg-white">

                    <h2 class="h4 text-black mb-5">Formularz</h2>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="id_x">Kwota kredytu</label>
                            <input type="text" id="id_x" class="form-control" name="x" placeholder="Podaj kwotę" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->x;?>
">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="id_y">Okres spłaty</label>
                            <input type="text" id="id_y" name="y" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->y;?>
" placeholder="Podaj okres w latach">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="id_z">Oprocentowanie</label>
                            <input type="text" id="id_z" name="z" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->z;?>
" placeholder="Podaj oprocentowanie">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12" >
                            <input type="submit" value="Oblicz" class="btn btn-primary btn-md text-white">
                        </div>
                    </div>


                </form>
            </div>

            <div class="col-md-5">

                <div class="p-4 mb-3">
                    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
                            <h4>   Wystąpiły błędy: </h4>
                            <ol class="err">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                                    <li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ol>
                        <?php }?>

                    <?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
                        <h4>Twoja rata: </h4>
                        <p class="oky">
                            <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

                        </p>
                    <?php }?>
                </div>

            </div>
        </div>
    </div>
    <?php
}
}
/* {/block 'content'} */
}
