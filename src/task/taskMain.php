<?php 
echo <<<TASKS

<section class="task bg-info">

<h3 >
$row->title
</h3>

<p >
$formatDescription
</p>

<div class="dropdown">
<a class="btn  dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="bi bi-three-dots-vertical"></i>
</a>

<ul class="dropdown-menu bg-secondary">
  <li><a class="dropdown-item " href="?pag=editTsk&id=$row->id"><i class="bi bi-eye"></i> Ver</a></li>
  <li>
  <form action="$_SERVER[PHP_SELF]?pag=user" method="post">
  <input type="hidden" name=$taskCompleted value="$row->id"/>
  <button type="submit" class="dropdown-item text-light"  > <i class="bi bi-check-lg"></i> Marcar como $taskHandleCompleted </button>
  </form>
  </li>
  <li>
  <form action="$_SERVER[PHP_SELF]?pag=user" method="post">
  <input type="hidden" name=taskDelete value="$row->id"/>
  <button type="submit" class="dropdown-item text-light" > <i class="bi bi-trash"></i> Excluir </button>
  </form>
  </li>
</ul>

</div>

<span style="background-color:$completed" />


</section>


TASKS;
?>