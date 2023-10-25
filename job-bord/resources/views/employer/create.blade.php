<x-layout>
  <x-card>
    <form action="{{ route('employer.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <x-label for="companyName" :required="true">Company Name</x-label>
        <x-text-input name="companyName" />
      </div>

      <x-button class="w-full">Create</x-button>
    </form>
  </x-card>
</x-layout>