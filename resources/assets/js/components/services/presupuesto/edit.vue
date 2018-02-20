<template>
  <p>
    <b-btn v-b-tooltip.hover title="Editar Presupuesto" variant="info" size="sm" @click="showModal">
      <i class="material-icons">edit</i>
    </b-btn>

    <b-modal ref="editPresupuestoModal" hide-footer title="Editar Presupuesto">
      <b-form @submit.stop.prevent="handleSubmit">
        <b-form-group label="Numero:">
            <b-form-input type="text"
                        placeholder="Ej: P00001"
                        v-model="presupuesto.numero"></b-form-input>
            <div v-show="numeroValidate.isValid">
                <p class="text-danger"><small>{{ numeroValidate.text }}</small></p>
            </div>
        </b-form-group>

        <b-form-group label="Descripcion:">
            <b-form-input type="text"
                        placeholder="Ej: presupuesto de instalacion ...."
                        v-model="presupuesto.descripcion"></b-form-input>
        </b-form-group>
        

        <b-form-group label="Usuario:">
            <b-form-input type="text"
                        placeholder="Ej: Usuario que realiza la Presupuesto"
                        v-model="presupuesto.usuario"></b-form-input>
            <div v-show="usuarioValidate.isValid">
                <p class="text-danger"><small>{{ usuarioValidate.text }}</small></p>
            </div>
        </b-form-group>

        <b-form-group label="Estado:">
            <b-form-input type="text"
                        placeholder="Ej: ARG"
                        v-model="presupuesto.estado"></b-form-input>
        </b-form-group>

        <b-form-group label="Obra:">
          <b-form-select v-model="presupuesto.obra_id" class="mb-3">
            <option :value="null">Seleccione una obra</option>
            <template v-for="selectItem in selectItems">
            <option :value="selectItem.id" v-bind:key="selectItem.id">{{ selectItem.numero }} - {{ selectItem.obra }}</option>
            </template> 
          </b-form-select>
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
      formValidate: false,
      selectItems: [],  
      numeroValidate: {
          isValid: false,
          text: ''
      },
      obraValidate: {
          isValid: false,
          text: ''
      },
      usuarioValidate: {
          isValid: false,
          text: ''
      },
      presupuesto: {
          id: null,
          numero: '',
          descripcion: '',
          usuario: '',
          estado: '',
          costo_material: '',
          costo_mo_montaje: '',
          costo_mo_programacion: '',
          costo_mo_tableros: '',
          obra_id: null
      },
      obra: {
          numero: '',
          obra: '',
          descripcion: '',
          costo: 0,
          tipo_moneda: '',
          forma_pago: '',
          fecha_limite: '',
          documentacion: '',
          estado: '',
          cliente_id: null
      }
    }
  },
  props: [
    'item'
  ],
  created () {
    this.presupuesto = this.item
    this.getSelectItems()
  },
  methods: {
    showModal () {
      this.$refs.editPresupuestoModal.show()
    },

    hideModal () {
      this.$refs.editPresupuestoModal.hide()
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
       if (this.presupuesto.numero === '') {
        this.numeroValidate.isValid = true
        this.numeroValidate.text = 'Este campo es requerido'
      } else if (this.presupuesto.usuario === '' || this.presupuesto.usuario.length < 3) {
        this.usuarioValidate.isValid = true
        this.usuarioValidate.text = 'Este campo es requerido y necesita al menos 3 caracteres'
      } else if (this.presupuesto.obra_id === null) {
        this.obraValidate.isValid = true
        this.obraValidate.text = 'Este campo es requerido'
      } else {
        this.obraValidate.isValid = false
        this.usuarioValidate.isValid = false
        this.obraValidate.isValid = false
        this.numeroValidate.text = ''
        this.usuarioValidate.text = ''
        this.obraValidate.text = ''
        this.formValidate = true
      }
      if (this.formValidate) {
        this.add()
      }
    },
    
    add () {
      this.$http.put(this.url + '/presupuesto/' + this.presupuesto.id, this.presupuesto)
      .then(response => {
        bus.$emit('subItems', response.data)  
        this.hideModal()
        this.alertSuccess()
      }, response => {
        this.alertError()
      })
    },

    getSelectItems () {
      this.$http.get(this.url + '/obra').then(response => {
        this.selectItems = response.data
      }, response => {
      })
    }
  }
}
</script>
