from xmlrpc.client import boolean
from pydantic import BaseModel

#me hice bolas y ya no entiendo esto grax no le muevan o lloro
#pd: no c cómo utilizar el "|", al parecer tengo que actualizar mi versión de python

class AlumnoBase(BaseModel):
    boleta: str | None = None
    

class Alumnos(AlumnoBase):
    aPaterno: str | None = None
    aMaterno: str | None = None
    nombres: str | None = None
    PM: str | None = None
    correo: str | None = None
    correo_tutor: str | None = None
    #foto: ?? 

class AlumnoInscrito(AlumnoBase):
    id_al: int
    ciclo: str
    grupo: str
    carrera: str
    turno: str
    promedio: float
    ua_inscritas: int


class Sanciones(AlumnoBase):
    folio_san: int
    nivel: int
    sancion: str 
    fecha_reporte: str
    observacion: str
    campo: str

class Normativa(BaseModel):
    cve_normativa: int | None = None
    ley: str | None = None
    articulo: str | None = None
    fraccion: str | None = None
    descripcion_nor: str | None = None
    abrev: str | None = None

class Tema_Incidencia(Normativa):
    cve_incidencia: int
    descripcion_inc: str

class Incidencias(Tema_Incidencia, AlumnoBase):
    folio_inc: int
    ciclo: str
    fecha: str
    hora: str
    hecho: str
    citatorio: bool
    quien_reporta: str
    observaciones: str

class Citatorio(Incidencias):
    id_cita: int
    no_cita: int
    fecha_generada: str
    fecha_cita: str
    hora: str
    area_cita: str
    persona_atiende: str
    recibio_cita: str
    acudio: bool

class Cred_Retenida(AlumnoBase):
    id_ret: int
    fecha_reg: str
    motivo_ret: str
    observacion_ret: str
    fecha_entrega: str

class Sin_Credencial(AlumnoBase):
    id_sincr: int
    fecha_solicitud: str
    motivo_sinc: str
    observacion_sinc: str
    fecha_entrega_sinc: str

class Cred_Olvidada(AlumnoBase):
    id_olv: int
    fecha_olvido: str
    veces: int


    class Config:
        orm_mode = True
