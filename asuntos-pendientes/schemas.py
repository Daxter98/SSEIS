from datetime import date, time
from pydantic import BaseModel, Field, Required
from typing import Union

class AsuntoBase(BaseModel):
    id: Union[int, None] = None
    idArea: Union[int, None] = None
    Cve_estatus: Union[str, None] = None
    Descripcion: Union[str, None] = None
    Prioridad: Union[str, None] = None 
    Fecha_limite: Union[date, None] = None 
    Fecha_respuesta: Union[date, None] = None 


class AsuntoCreate(AsuntoBase):
    pass

class AsuntoUpdate(AsuntoBase):
    pass

class Asunto(AsuntoBase):
    id: int

    class Config:
        orm_mode = True