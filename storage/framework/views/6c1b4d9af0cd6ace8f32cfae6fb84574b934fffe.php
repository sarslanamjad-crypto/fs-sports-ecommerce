<?php $__env->startSection('title', 'Audit Trail — FS Sports'); ?>
<?php $__env->startSection('main-container'); ?>
<div class="container-fluid"><br>
    <div class="card shadow mb-4" style="border-radius:16px;border:none">
        <div class="card-header py-3 d-flex align-items-center justify-content-between" style="background:#fff;border-radius:16px 16px 0 0;border-bottom:1px solid #e2e8f0">
            <h6 class="m-0 font-weight-bold" style="color:#334155">
                <i class="fas fa-history mr-2" style="color:#f59e0b"></i>
                <a style="color:#6366f1;text-decoration:none" href="<?php echo e(url('/admin')); ?>">Dashboard</a>
                <span class="text-muted mx-1">/</span> Audit Trail
            </h6>
            <a href="<?php echo e(route('admin.audit-trail.create')); ?>" class="btn btn-sm shadow-sm" style="background:#6366f1;color:#fff;border-radius:8px;font-weight:600">
                <i class="fas fa-plus fa-sm mr-1"></i> Add New
            </a>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success" style="border-radius:10px;border:none;background:rgba(16,185,129,.1);color:#059669">
                    <i class="fas fa-check-circle mr-1"></i> <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="auditTable" width="100%" cellspacing="0">
                    <thead style="background:#f8fafc">
                        <tr>
                            <th>ID</th>
                            <th>User Id</th>
                            <th>Event</th>
                            <th>Old Values</th>
                            <th>New Values</th>
                            <th>Ip Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->user_id); ?></td>
                            <td>
                                <?php
                                    $eventColors = ['created'=>'#10b981','updated'=>'#6366f1','deleted'=>'#ef4444'];
                                    $ec = $eventColors[strtolower($item->event)] ?? '#64748b';
                                ?>
                                <span style="display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:6px;background:<?php echo e($ec); ?>15;color:<?php echo e($ec); ?>;font-weight:700;font-size:.78rem"><?php echo e(ucfirst($item->event)); ?></span>
                            </td>
                            <td><code style="font-size:.75rem;color:#64748b"><?php echo e(Str::limit($item->old_values, 50)); ?></code></td>
                            <td><code style="font-size:.75rem;color:#334155"><?php echo e(Str::limit($item->new_values, 50)); ?></code></td>
                            <td><span style="font-family:monospace;font-size:.8rem"><?php echo e($item->ip_address); ?></span></td>
                            <td>
                                <a href="<?php echo e(route('admin.audit-trail.edit', $item->id)); ?>" class="btn btn-sm" style="background:rgba(99,102,241,.1);color:#6366f1;border-radius:6px" title="Edit"><i class="fas fa-edit"></i></a>
                                <form method="post" class="d-inline" action="<?php echo e(route('admin.audit-trail.destroy', $item->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button class="btn btn-sm" style="background:rgba(239,68,68,.1);color:#ef4444;border-radius:6px" onClick="return confirm('Are you sure you want to Delete Record?');" title="Delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function(){
    $('#auditTable').DataTable({
        dom: '<"row align-items-center mb-3"<"col-md-6"B><"col-md-6"f>>rtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel mr-1"></i> Excel',
                className: 'btn btn-sm shadow-sm',
                title: 'FS Sports — Audit Trail',
                exportOptions: { columns: [0,1,2,3,4,5] },
                init: function(api, node){ $(node).css({background:'#10b981',color:'#fff',border:'none',borderRadius:'8px',fontWeight:'600',fontSize:'.78rem'}); }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf mr-1"></i> PDF',
                className: 'btn btn-sm shadow-sm ml-2',
                title: 'FS Sports — Audit Trail',
                exportOptions: { columns: [0,1,2,3,4,5] },
                orientation: 'landscape',
                pageSize: 'A4',
                init: function(api, node){ $(node).css({background:'#ef4444',color:'#fff',border:'none',borderRadius:'8px',fontWeight:'600',fontSize:'.78rem'}); }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print mr-1"></i> Print',
                className: 'btn btn-sm shadow-sm ml-2',
                title: 'FS Sports — Audit Trail',
                exportOptions: { columns: [0,1,2,3,4,5] },
                init: function(api, node){ $(node).css({background:'#64748b',color:'#fff',border:'none',borderRadius:'8px',fontWeight:'600',fontSize:'.78rem'}); }
            }
        ],
        order: [[0, 'desc']],
        pageLength: 15,
        language: {
            search: '_INPUT_',
            searchPlaceholder: 'Search audit logs...',
            lengthMenu: 'Show _MENU_ entries',
            info: 'Showing _START_ to _END_ of _TOTAL_ records'
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\CUI Data\6th Semester\Advance Web\AdvanceWebProject\resources\views\backend\audit-trail\index.blade.php ENDPATH**/ ?>