<template>
  <p>
    <b-btn v-b-tooltip.hover title="Editar Contacto" variant="info" size="sm" @click="showModal">
      <i class="material-icons">edit</i>
    </b-btn>

    <b-modal ref="editContactoModal" hide-footer title="Agregar Contacto">
      <b-form @submit.stop.prevent="handleSubmit">
        <b-form-group label="Nombre:">
            <b-form-input type="text"
                        placeholder="Ej: Juan"
                        v-model="contacto.nombre"></b-form-input>
            <div v-show="nombreValidate.isValid">
                <p class="text-danger"><small>{{ nombreValidate.text }}</small></p>
            </div>
        </b-form-group>
        

        <b-form-group label="Puesto:">
            <b-form-input type="text"
                        placeholder="Ej: Programador"
                        v-model="contacto.puesto"></b-form-input>
        </b-form-group>

        <b-form-group label="Email:">
            <b-form-input type="text"
                        placeholder="Ej: juan.livingston@systelec.com.ar"
                        v-model="contacto.email"></b-form-input>
        </b-form-group>

        <b-form-group label="Telefono:">
            <b-form-input type="text"
                        placeholder="Ej: 011-4444-4444"
                        v-model="contacto.telefono"></b-form-input>
        </b-form-group>

        <b-form-group label="Celular:">
            <b-form-input type="text"
                        placeholder="Ej: 011-1512345678"
                        v-model="contacto.celular"></b-form-input>
        </b-form-group>
      </b-form>
      <b-btn variant="primary" @click="save()">Guardar</b-btn>
      <b-btn variant="danger" @click="hideModal()">Cerrar</b-btn>
    </b-modal>
  </p>
</template>

<script>
import swal from 'sweetalert2'
import { bus } from '../../../app.js'

export default {
  data () {
    return {
      url: 'http://localhost/systelecerp/public/api',
      nombreValidate: {
          isValid: false,
          text: ''
      },
      contacto: {
          nombre: '',
          puesto: '',
          email: '',
          telefono: '',
          celular: '',
          cliente_id: 0
      }
    }
  },
  props: [
    'subItem'
  ],
  created () {
    this.contacto = this.subItem
  },
  methods: {
    showModal () {
      this.$refs.editContactoModal.show()
    },

    hideModal () {
      this.$refs.editContactoModal.hide()
    },

    alertError (error) {
      swal(
        'Registro fallido!',
        'Ocurrio un error al intentar guardar el registro en la base de datos. ' + error,
        'error'
      )
    },

    alertSuccess () {
      swal(
        'Registro exitoso!',
        'Se guardo con exito en la base de datos!',
        'success'
      )
    },

    save () {
      if (this.contacto.nombre === '' || this.contacto.nombre.length < 2) {
        this.nombreValidate.isValid = true
        this.nombreValidate.text = 'Este campo es requerido y necesita al menos 2 caracteres'
      } else {
        this.nombreValidate.isValid = false
        this.nombreValidate.text = ''
        this.add()
      }
    },
    
    add () {
      this.$http.put(this.url + '/contacto/' + this.contacto.id, this.contacto)
      .then(response => {
        bus.$emit('subItems', response.data)  
        this.hideModal()
        this.alertSuccess()
      }, response => {
        this.alertError()
      })
    }
  }
}
</script>
