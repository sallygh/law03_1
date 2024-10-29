<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
        <style>
            .cta-button {
                display: inline-block;
                margin: 20px auto;
                padding: 10px 20px;
                background: #fff;
                /* اللون الأساسي للزر */
                color: #DAA520;
                /* لون النص */
                border: 2px solid #DAA520;
                /* حدود الزر */
                border-radius: 5px;
                text-decoration: none;
                transition: background 0.3s, color 0.3s, transform 0.3s;
                /* انتقالات لتحسين التأثيرات */
            }

            .cta-button:hover {
                background: #DAA520;
                /* اللون عند التحويم */
                color: #fff;
                /* لون النص عند التحويم */
                transform: scale(1.05);
                /* تأثير التكبير عند التحويم */
            }
        </style>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <a href="{{ route('lawsuits.index') }}" class="cta-button text-center hover:bg-yellow-500 hover:text-white transform hover:scale-105 transition-all duration-300" title="إدارة القضايا">
                        إدارة القضايا
                    </a>
                    <a href="{{ route('clients.index') }}" class="cta-button text-center hover:bg-yellow-500 hover:text-white transform hover:scale-105 transition-all duration-300" title="إدارة الموكلين">
                        إدارة الموكلين
                    </a>
                    <a href="#" onclick="alert('قيد التطوير حاليًا'); return false;" class="cta-button text-center hover:bg-yellow-500 hover:text-white transform hover:scale-105 transition-all duration-300" title="إدارة المهام">
                        إدارة المهام
                    </a>
                    <a href="#" onclick="alert('قيد التطوير حاليًا'); return false;" class="cta-button text-center hover:bg-yellow-500 hover:text-white transform hover:scale-105 transition-all duration-300" title="إدارة المستندات">
                        إدارة المستندات
                    </a>
                    <a href="#" onclick="alert('قيد التطوير حاليًا'); return false;" class="cta-button text-center hover:bg-yellow-500 hover:text-white transform hover:scale-105 transition-all duration-300" title="إدارة المالية">
                        إدارة المالية
                    </a>
                    <a href="#" onclick="alert('قيد التطوير حاليًا'); return false;" class="cta-button text-center hover:bg-yellow-500 hover:text-white transform hover:scale-105 transition-all duration-300" title="بحث">
                        بحث
                    </a>
                </div>

            </div>
        </div>
    </x-slot>
</x-app-layout>