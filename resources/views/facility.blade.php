<section class="my-8">
  <h2 class="text-xl font-semibold mb-4">Section A: Facility Information</h2>
  
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium mb-1">Registration/Gazetted Name</label>
        <input type="text" name="registration_name" class="w-full border rounded px-3 py-2" placeholder="Enter name">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Master Facility No.</label>
        <input type="text" name="master_facility_no" class="w-full border rounded px-3 py-2" placeholder="Enter number">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Registration No.</label>
        <input type="text" name="registration_no" class="w-full border rounded px-3 py-2" placeholder="Enter registration number">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Physical Location</label>
        <input type="text" name="physical_location" class="w-full border rounded px-3 py-2" placeholder="Enter location">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Name of Contact Person</label>
        <input type="text" name="contact_person_name" class="w-full border rounded px-3 py-2" placeholder="Full name">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Qualification of Contact Person</label>
        <input type="text" name="qualification_of_contact_person" class="w-full border rounded px-3 py-2" placeholder="e.g. MBChB">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">County</label>
        <input type="text" name="county" class="w-full border rounded px-3 py-2" placeholder="e.g. Nairobi">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Sub-County</label>
        <input type="text" name="sub_county" class="w-full border rounded px-3 py-2" placeholder="e.g. Westlands">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Address</label>
        <input type="text" name="address" class="w-full border rounded px-3 py-2" placeholder="P.O. Box or location">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Town/Market</label>
        <input type="text" name="town" class="w-full border rounded px-3 py-2" placeholder="Town/market">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Code</label>
        <input type="text" name="code" class="w-full border rounded px-3 py-2" placeholder="Postal code">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Building/Plot No.</label>
        <input type="text" name="building_plot_no" class="w-full border rounded px-3 py-2" placeholder="e.g. Plot 123A">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Phone Number</label>
        <input type="tel" name="phone" class="w-full border rounded px-3 py-2" placeholder="+2547...">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Email</label>
        <input type="email" name="email" class="w-full border rounded px-3 py-2" placeholder="example@email.com">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Current Facility Level</label>
        <input type="text" name="facility_level" class="w-full border rounded px-3 py-2" placeholder="e.g. Level 5A">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Facility Ownership</label>
        <select name="facility_ownership" class="w-full border rounded px-3 py-2 pr-8">
          <option value="">Select</option>
          <option value="government">Government/Public Entity</option>
          <option value="faith">Faith Based</option>
          <option value="private">Private</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Catchment Population</label>
        <input type="number" name="catchment_population" class="w-full border rounded px-3 py-2" placeholder="e.g. 50000">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Monthly Outpatient Workload</label>
        <input type="number" name="monthly_outpatient_workload" class="w-full border rounded px-3 py-2" placeholder="e.g. 3000">
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">In-patient Bed Capacity</label>
        <input type="number" name="inpatient_bed_capacity" class="w-full border rounded px-3 py-2" placeholder="e.g. 120">
      </div>
      <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Description of Location (Prominent Landmark)</label>
        <textarea name="location_description" class="w-full border rounded px-3 py-2" rows="2" placeholder="e.g. Near County Hospital, opposite Shell Station"></textarea>
      </div>
      <div class="md:col-span-2">
        <label class="block text-sm font-medium mb-1">Facility Level Description</label>
        <textarea name="facility_level_description" class="w-full border rounded px-3 py-2" rows="3" placeholder="Describe the type, purpose, and capacity of the facility..."></textarea>
      </div>
    </div>
  
</section>
