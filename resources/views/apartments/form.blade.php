<!-- resources/views/apartments/form.blade.php -->
@csrf
<form id="apartmentForm" action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm"> <!-- استخدام CSS Grid مع حجم خط أصغر -->
        <div class="mb-2">
            <label for="property_number" class="block text-gray-700 text-right mb-2 font-cairo">رقم العقار</label>
            <input type="text" id="property_number" name="property_number" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" value="{{ old('property_number', $apartment->property_number ?? '') }}">
        </div>

        <div class="mb-2">
            <label for="real_estate_area" class="block text-gray-700 text-right mb-2 font-cairo">المنطقة العقارية</label>
            <input type="text" id="real_estate_area" name="real_estate_area" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" value="{{ old('real_estate_area', $apartment->real_estate_area ?? '') }}">
        </div>

        <div class="mb-2">
            <label for="share_quota" class="block text-gray-700 text-right mb-2 font-cairo">الحصة السهمية</label>
            <input type="text" id="share_quota" name="share_quota" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" value="{{ old('share_quota', $apartment->share_quota ?? '') }}">
        </div>

        <div class="mb-2">
            <label for="area" class="block text-gray-700 text-right mb-2 font-cairo">المساحة</label>
            <input type="text" id="area" name="area" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" value="{{ old('area', $apartment->area ?? '') }}">
        </div>

        <div class="mb-2">
            <label for="direction" class="block text-gray-700 text-right mb-2 font-cairo">الاتجاه</label>
            <input type="text" id="direction" name="direction" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" value="{{ old('direction', $apartment->direction ?? '') }}">
        </div>

        <div class="mb-2">
            <label for="address" class="block text-gray-700 text-right mb-2 font-cairo">العنوان</label>
            <input type="text" id="address" name="address" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" value="{{ old('address', $apartment->address ?? '') }}">
        </div>

        <div class="mb-2">
            <label for="financial" class="block text-gray-700 text-right mb-2 font-cairo">المالية</label>
            <input type="text" id="financial" name="financial" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" value="{{ old('financial', $apartment->financial ?? '') }}">
        </div>

        <div class="mb-2">
            <label for="previous_signs" class="block text-gray-700 text-right mb-2 font-cairo">إشارات سابقة</label>
            <input type="text" id="previous_signs" name="previous_signs" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" value="{{ old('previous_signs', $apartment->previous_signs ?? '') }}">
        </div>

        <div class="mb-2 col-span-3">
            <label for="notes" class="block text-gray-700 text-right mb-2 font-cairo">ملاحظات</label>
            <textarea id="notes" name="notes" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo">{{ old('notes', $apartment->notes ?? '') }}</textarea>
        </div>

        <div class="mb-2 col-span-3">
            <label for="attachments" class="block text-gray-700 text-right mb-2 font-cairo">مرفقات</label>
            <input type="file" id="attachments" name="attachments[]" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50 font-cairo" multiple>
        </div>
    </div>

</form>