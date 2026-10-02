$(document).ready(function() {
    function initJsonList($textarea, fields) {
        $textarea.addClass('d-none json-list-initialized');
        
        const $wrapper = $('<div class="json-list-wrapper border rounded p-3 mb-2 bg-light-subtle"></div>');
        const $list = $('<div class="json-list-items mb-3"></div>');
        
        // Build input form based on fields
        let inputsHtml = '<div class="row g-2 align-items-end"><div class="col-md-12 fw-bold text-muted small mb-1">إضافة عنصر جديد</div>';
        fields.forEach(f => {
            let width = f.width || 'col';
            if (f.type === 'select') {
                let options = f.options.map(o => `<option value="${o.value}">${o.label}</option>`).join('');
                inputsHtml += `<div class="${width}"><label class="small text-muted">${f.label}</label><select class="form-select form-select-sm" data-key="${f.key}">${options}</select></div>`;
            } else {
                inputsHtml += `<div class="${width}"><label class="small text-muted">${f.label}</label><input type="text" class="form-control form-control-sm" data-key="${f.key}" placeholder="${f.placeholder}"></div>`;
            }
        });
        inputsHtml += `<div class="col-auto"><button type="button" class="btn btn-sm btn-primary json-list-add"><i class="bi bi-plus"></i> إضافة</button></div></div>`;
        
        const $inputGroup = $(inputsHtml);
        $wrapper.append($list).append($inputGroup);
        $textarea.after($wrapper);
        
        function normalizeItem(item) {
            if (typeof item === 'string') {
                const normalized = {};
                const hasTitle = fields.some(f => f.key === 'title');
                fields.forEach(f => {
                    if (f.key === 'title') {
                        normalized[f.key] = item;
                    } else if (!hasTitle && f.key === fields[0].key) {
                        normalized[f.key] = item;
                    } else {
                        normalized[f.key] = f.type === 'select' ? (f.options[0]?.value || '') : '';
                    }
                });
                return normalized;
            }
            return item;
        }

        // Load initial data
        let initialData = [];
        try {
            const val = $textarea.val().trim();
            if (val) {
                initialData = JSON.parse(val);
                if (!Array.isArray(initialData)) initialData = [];
            }
        } catch(e) {
            console.error('Failed to parse JSON', e);
        }
        
        initialData.forEach(item => {
            addItem(normalizeItem(item));
        });
        
        function updateTextarea() {
            const currentItems = [];
            $list.find('.json-list-item').each(function() {
                currentItems.push($(this).data('item'));
            });
            $textarea.val(JSON.stringify(currentItems));
        }
        
        function createItemRow(item) {
            let displayHtml = '';
            fields.forEach(f => {
                if (item[f.key]) {
                    if (f.key === 'icon' && (item[f.key].startsWith('http') || item[f.key].startsWith('/'))) {
                        displayHtml += `<div class="me-3"><strong>${f.label}:</strong> <img src="${item[f.key]}" width="20" height="20" class="rounded"></div>`;
                    } else if (f.key === 'icon' && item[f.key].startsWith('bi-')) {
                        displayHtml += `<div class="me-3"><strong>${f.label}:</strong> <i class="bi ${item[f.key]}"></i></div>`;
                    } else {
                        displayHtml += `<div class="me-3"><strong>${f.label}:</strong> ${item[f.key]}</div>`;
                    }
                }
            });
            
            const $itemRow = $(`
                <div class="json-list-item d-flex justify-content-between align-items-center bg-white border shadow-sm rounded px-3 py-2 mb-2">
                    <div class="d-flex flex-wrap small text-dark">${displayHtml}</div>
                    <div>
                        <button type="button" class="btn btn-sm text-primary btn-edit-item py-0 px-2 border-0" title="تعديل"><i class="bi bi-pencil"></i></button>
                        <button type="button" class="btn btn-sm text-danger btn-remove-item py-0 px-2 border-0" title="حذف"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            `);
            $itemRow.data('item', item);
            return $itemRow;
        }

        function addItem(item) {
            // Validate at least one field has content
            if (!fields.some(f => item[f.key] && item[f.key].toString().trim() !== '')) return;
            $list.append(createItemRow(item));
        }

        
        // Add/Save event
        $inputGroup.find('.json-list-add').on('click', function() {
            const newItem = {};
            let hasData = false;
            fields.forEach(f => {
                const val = $inputGroup.find(`[data-key="${f.key}"]`).val().trim();
                newItem[f.key] = val;
                if (val) hasData = true;
            });
            
            if (hasData) {
                const $editingRow = $inputGroup.data('editing-row');
                
                if ($editingRow) {
                    $editingRow.replaceWith(createItemRow(newItem));
                    $inputGroup.removeData('editing-row');
                    $(this).html('<i class="bi bi-plus"></i> إضافة').removeClass('btn-success').addClass('btn-primary');
                } else {
                    addItem(newItem);
                }
                
                updateTextarea();
                fields.forEach(f => {
                    if (f.type !== 'select') {
                        $inputGroup.find(`[data-key="${f.key}"]`).val('');
                    }
                });
                $inputGroup.find(`input`).first().focus();
            }
        });

        
        // Remove event
        $list.on('click', '.btn-remove-item', function() {
            $(this).closest('.json-list-item').remove();
            
            // If deleting the currently edited row, reset the form
            if ($inputGroup.data('editing-row') && $inputGroup.data('editing-row').is($(this).closest('.json-list-item'))) {
                $inputGroup.removeData('editing-row');
                $inputGroup.find('.json-list-add').html('<i class="bi bi-plus"></i> إضافة').removeClass('btn-success').addClass('btn-primary');
                fields.forEach(f => { if (f.type !== 'select') $inputGroup.find(`[data-key="${f.key}"]`).val(''); });
            }
            
            updateTextarea();
        });
        
        // Edit event
        $list.on('click', '.btn-edit-item', function() {
            const $row = $(this).closest('.json-list-item');
            const item = $row.data('item');
            
            fields.forEach(f => {
                $inputGroup.find(`[data-key="${f.key}"]`).val(item[f.key] || '');
            });
            
            $inputGroup.data('editing-row', $row);
            $inputGroup.find('.json-list-add').html('<i class="bi bi-check-circle"></i> حفظ التعديل').removeClass('btn-primary').addClass('btn-success');
        });
        
        // Provide clear function attached to textarea
        $textarea.data('clearItems', function(newVal = null) {
            $list.empty();
            if (newVal) {
                try {
                    const parsed = JSON.parse(newVal);
                    if (Array.isArray(parsed)) {
                        parsed.forEach(i => addItem(normalizeItem(i)));
                    }
                } catch(e){}
            }
            updateTextarea();
        });
    }

    // Build options from APP_ICONS
    function getIconOptions(category, defaultOptions) {
        if (window.APP_ICONS && window.APP_ICONS[category]) {
            return window.APP_ICONS[category].map(icon => ({
                value: icon.icon_url,
                label: icon.name
            }));
        }
        return defaultOptions;
    }

    window.initAllJsonLists = function(container = document) {
        // Initialize specific textareas
        // 1. Certificates
        $(container).find('.json-certificates-data').not('.json-list-initialized').each(function() {
            initJsonList($(this), [
                { key: 'title', label: 'الشهادة', type: 'text', placeholder: 'مثال: PMP', width: 'col-md-4' },
                { key: 'subtitle', label: 'الوصف', type: 'text', placeholder: 'مثال: إدارة المشاريع', width: 'col-md-5' },
                { key: 'icon', label: 'الأيقونة', type: 'select', width: 'col-md-3', options: getIconOptions('certificates', [
                    { value: 'blue-hexagon', label: 'سداسي أزرق (افتراضي)' }
                ])}
            ]);
        });

        // 2. Programs
        $(container).find('.json-programs-data').not('.json-list-initialized').each(function() {
            initJsonList($(this), [
                { key: 'title', label: 'اسم البرنامج', type: 'text', placeholder: 'مثال: قيادة الفرق', width: 'col-md-4' },
                { key: 'subtitle', label: 'الوصف', type: 'text', placeholder: 'مثال: تطوير مهارات القيادة وتحفيز الآخرين', width: 'col-md-4' },
                { key: 'icon', label: 'الأيقونة', type: 'select', width: 'col-md-3', options: getIconOptions('programs', [
                    { value: 'bi-journal-bookmark', label: 'كتاب (افتراضي)' }
                ])}
            ]);
        });

        // 3. Plan 30 Days
        $(container).find('.json-plan-data').not('.json-list-initialized').each(function() {
            initJsonList($(this), [
                { key: 'period', label: 'الفترة', type: 'text', placeholder: 'مثال: الأسبوع الأول', width: 'col-md-3' },
                { key: 'title', label: 'الخطوة/المهمة', type: 'text', placeholder: 'مثال: تحديد الأولويات', width: 'col-md-5' },
                { key: 'icon', label: 'الأيقونة', type: 'select', width: 'col-md-3', options: getIconOptions('plan_30_days', [
                    { value: 'bi-calendar-check', label: 'تقويم (افتراضي)' }
                ])}
            ]);
        });
    };

    // Run on document load
    window.initAllJsonLists();
});
