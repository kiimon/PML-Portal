<!-- OVERLAY -->
<div id="heroModal"
     class="fixed inset-0 hidden items-center justify-center z-50">

    <!-- BACKDROP -->
    <div class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>

    <!-- MODAL -->
    <div class="relative bg-gray-900 text-white rounded-lg p-8 w-[420px] shadow-2xl z-10">

        <h2 class="text-xl font-bold mb-6">
            Add Hero
        </h2>

        <form method="POST" action="{{ route('heroes.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">Hero Name</label>
                <input type="text" name="name"
                    class="w-full p-2 rounded bg-gray-800 border border-gray-600">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Icon URL</label>
                <input type="text" name="icon_url"
                    class="w-full p-2 rounded bg-gray-800 border border-gray-600">
            </div>

            <div class="mb-6">
                <label class="block mb-1">Portrait URL</label>
                <input type="text" name="portrait_url"
                    class="w-full p-2 rounded bg-gray-800 border border-gray-600">
            </div>

            <div class="flex justify-end gap-3">

                <button type="button"
                        onclick="closeModal()"
                        class="px-4 py-2 bg-gray-600 rounded">
                    Cancel
                </button>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 rounded">
                    Save
                </button>

            </div>

        </form>

    </div>

</div>