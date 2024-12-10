@csrf
<div class="container mx-auto mt-10 bg-white p-5 rounded shadow">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-sm">



        <div class="form-group mb-4">
            <label for="full_name" class="block text-gray-700 text-right mb-2 font-cairo">الاسم الثلاثي</label>
            <input type="text" name="full_name" id="full_name" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" required>
        </div>

        <div class="form-group mb-4">
            <label for="phone" class="block text-gray-700 text-right mb-2 font-cairo">رقم الهاتف</label>
            <input type="text" name="phone" id="phone" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" required>
        </div>

        <div class="form-group mb-4">
            <label for="address" class="block text-gray-700 text-right mb-2 font-cairo">العنوان</label>
            <input type="text" name="address" id="address" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" required>
        </div>

        <div class="form-group mb-4">
            <label for="notes" class="block text-gray-700 text-right mb-2 font-cairo">ملاحظات</label>
            <textarea name="notes" id="notes" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo"></textarea>
        </div>

        <!-- إضافة بنود المرفقات -->
        <div class="form-group mb-4">
            <label for="attachment1" class="block text-gray-700 text-right mb-2 font-cairo">مرفق 1</label>
            <input type="file" name="attachments[]" id="attachment1" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">
        </div>

        <div class="form-group mb-4">
            <label for="attachment2" class="block text-gray-700 text-right mb-2 font-cairo">مرفق 2</label>
            <input type="file" name="attachments[]" id="attachment2" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">
        </div>

        <div class="form-group mb-4">
            <label for="attachment3" class="block text-gray-700 text-right mb-2 font-cairo">مرفق 3</label>
            <input type="file" name="attachments[]" id="attachment3" class="form-control block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">
        </div>

        <!-- زر الحفظ يظهر فقط إذا كانت قيمة المتغير showSaveButton هي true -->
        @if(isset($showSaveButton) && $showSaveButton) <div class="flex justify-end"> <button type="submit" class="btn btn-primary bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">حفظ الموكل</button> </div> @endif

        <div>
            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700">حفظ القضية</button>
        </div>
    </div>
</div>