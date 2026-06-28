'use client'

import { useForm } from 'react-hook-form'

type FormData = {
  name: string
  email: string
  phone?: string
  service: string
  message: string
}

const serviceOptions = ['Architecture', 'Interior Design', 'Urban Design', 'General Enquiry']

export default function ContactForm() {
  const {
    register,
    handleSubmit,
    formState: { errors, isSubmitting, isSubmitSuccessful },
  } = useForm<FormData>()

  const onSubmit = async (data: FormData) => {
    await fetch('/api/contact', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    })
  }

  if (isSubmitSuccessful) {
    return (
      <div className="bg-forest/10 border border-forest/20 p-10 text-center">
        <p className="font-display text-2xl text-charcoal mb-3">Thank you.</p>
        <p className="text-charcoal-muted text-sm">
          We&apos;ve received your message and will be in touch within two business days.
        </p>
      </div>
    )
  }

  return (
    <form onSubmit={handleSubmit(onSubmit)} className="space-y-6" noValidate>
      <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label className="block text-[10px] uppercase tracking-[0.2em] text-stone mb-2">Name *</label>
          <input
            {...register('name', { required: 'Name is required' })}
            className="w-full bg-transparent border-b border-charcoal/20 pb-3 text-charcoal text-sm outline-none focus:border-terracotta transition-colors duration-200 placeholder:text-stone"
            placeholder="Your full name"
          />
          {errors.name && <p className="mt-1 text-terracotta text-xs">{errors.name.message}</p>}
        </div>
        <div>
          <label className="block text-[10px] uppercase tracking-[0.2em] text-stone mb-2">Email *</label>
          <input
            {...register('email', {
              required: 'Email is required',
              pattern: { value: /^\S+@\S+\.\S+$/, message: 'Invalid email' },
            })}
            type="email"
            className="w-full bg-transparent border-b border-charcoal/20 pb-3 text-charcoal text-sm outline-none focus:border-terracotta transition-colors duration-200 placeholder:text-stone"
            placeholder="your@email.com"
          />
          {errors.email && <p className="mt-1 text-terracotta text-xs">{errors.email.message}</p>}
        </div>
      </div>

      <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label className="block text-[10px] uppercase tracking-[0.2em] text-stone mb-2">Phone</label>
          <input
            {...register('phone')}
            type="tel"
            className="w-full bg-transparent border-b border-charcoal/20 pb-3 text-charcoal text-sm outline-none focus:border-terracotta transition-colors duration-200 placeholder:text-stone"
            placeholder="Optional"
          />
        </div>
        <div>
          <label className="block text-[10px] uppercase tracking-[0.2em] text-stone mb-2">Service *</label>
          <select
            {...register('service', { required: 'Please select a service' })}
            className="w-full bg-transparent border-b border-charcoal/20 pb-3 text-charcoal text-sm outline-none focus:border-terracotta transition-colors duration-200 appearance-none cursor-pointer"
          >
            <option value="">Select a service</option>
            {serviceOptions.map(s => <option key={s} value={s}>{s}</option>)}
          </select>
          {errors.service && <p className="mt-1 text-terracotta text-xs">{errors.service.message}</p>}
        </div>
      </div>

      <div>
        <label className="block text-[10px] uppercase tracking-[0.2em] text-stone mb-2">Message *</label>
        <textarea
          {...register('message', {
            required: 'Message is required',
            minLength: { value: 20, message: 'Please tell us a bit more' },
          })}
          rows={6}
          className="w-full bg-transparent border-b border-charcoal/20 pb-3 text-charcoal text-sm outline-none focus:border-terracotta transition-colors duration-200 resize-none placeholder:text-stone"
          placeholder="Tell us about your project…"
        />
        {errors.message && <p className="mt-1 text-terracotta text-xs">{errors.message.message}</p>}
      </div>

      <button
        type="submit"
        disabled={isSubmitting}
        className="text-[10px] font-body font-light uppercase tracking-[0.22em] bg-charcoal text-sand-light px-10 py-4 hover:bg-terracotta transition-colors duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
      >
        {isSubmitting ? 'Sending…' : 'Send Message'}
      </button>
    </form>
  )
}
